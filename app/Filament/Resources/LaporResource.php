<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporResource\Pages;
use App\Filament\Resources\LaporResource\RelationManagers;
use App\Models\Lapor;
use App\Models\StatusHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReportStatusUpdatedMail;
use Carbon\Carbon;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Log;

class LaporResource extends Resource
{
    protected static ?string $model = Lapor::class;

    protected static ?string $pluralModelLabel = "Lapor Budaya";

    protected static ?string $navigationGroup = "Kotak Masuk";

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    protected static ?string $navigationBadgeTooltip = 'The number of users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              TextInput::make('name')
                ->readOnly(),
              TextInput::make('location')
                ->readOnly(),
              Repeater::make('images')
                ->label('Gambar Laporan')
                ->relationship('images')
                ->schema([
                    FileUpload::make('path')
                        ->label('Upload Gambar')
                        ->image()
                        ->disk('public')
                        ->directory('lapor_images')
                        ->previewable(true) // Agar preview muncul
                        ->disabled() // Agar gambar tidak bisa diubah
                        ->getUploadedFileNameForStorageUsing(fn ($file) => 'lapor_images/' . $file->hashName()),
                ])
                ->grid(3),
              TextArea::make('description')
                ->readOnly()
                ->rows(5),
              TextInput::make('reporter')
                ->readOnly(),
              Select::make('status')
                ->options([
                    'Laporan Dikirim' => 'Laporan Dikirim',
                    'Laporan Telah Dibaca' => 'Laporan Telah Dibaca',
                    'Laporan Ditinjau' => 'Laporan Ditinjau',
                    'Laporan Ditolak' => 'Laporan Ditolak',
                    'Laporan Selesai' => 'Laporan Selesai',
                ])
                ->afterStateUpdated(function ($state, $set, $get, $record) {
                    // Simpan status ke tabel lapors
                    $record->status = $state;
                    $record->save();
            
                    // Simpan catatan perubahan status ke tabel status_histories
                    $note = $get('note') ?: 'Tidak ada catatan';
                    $record->statusHistories()->create([
                        'status' => $state,
                        'note' => $note,
                    ]);
            
                    // Cek apakah pelapor dari tabel users atau internals
                    $userEmail = $record->user?->email ?? $record->internal?->email ?? null;
            
                    // Kirim email jika email ditemukan
                    if ($userEmail) {
                        Mail::to($userEmail)->send(new ReportStatusUpdatedMail($record));
                    } else {
                        Log::warning('User email not found for record ID ' . $record->id);
                    }
                }),            
            
            Textarea::make('note')
                ->label('Catatan Perubahan Status')
                ->nullable()
                ->afterStateUpdated(function ($state, $set, $get, $record) {
                  if ($record->status) {
                      $latestHistory = $record->statusHistories()
                          ->where('status', $record->status)
                          ->latest()
                          ->first();
          
                      if ($latestHistory) {
                          // Update note pada status terakhir
                          $latestHistory->update(['note' => $state]);
                      } else {
                          // Jika tidak ada history, buat baru
                          $record->statusHistories()->create([
                              'status' => $record->status,
                              'note' => $state,
                          ]);
                      }
                  }
              })                                                                                                     
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              ImageColumn::make('images.path')
                ->label('Gambar')
                ->disk('public') // Menggunakan disk public
                ->size(40), // Ukuran thumbnail
              TextColumn::make('name')
                ->label('Kebudayaan')
                ->searchable()
                ->formatStateUsing(fn ($record) => "
                    <div>
                        <strong>{$record->name}</strong><br>
                        {$record->location}
                    </div>
                ")
                ->html(),
              TextColumn::make('description')
                ->label('Deskripsi')
                ->limit(15),
              TextColumn::make('reporter')
                ->label('Pelapor')
                ->limit(10),
              TextColumn::make('status')
                ->label('Status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Laporan Dikirim' => 'blue',
                    'Laporan Telah Dibaca' => 'gray',
                    'Laporan Ditinjau' => 'success',
                    'Laporan Ditolak' => 'danger',
                    'Laporan Selesai' => 'green',
                  }),
              TextColumn::make('note')
                ->label('Catatan')
                ->limit(20),
              TextColumn::make('created_at')
                ->label('Tanggal Laporan')
                ->formatStateUsing(fn ($state) => Carbon::parse($state)->translatedFormat('d M Y'))
                ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
              Tables\Actions\ViewAction::make(),
              Tables\Actions\EditAction::make(),
              Tables\Actions\ActionGroup::make([
                  Action::make('shareToWhatsApp')
                      ->label('Bagikan ke WhatsApp')
                      ->color('green')
                      ->icon('heroicon-o-chat-bubble-bottom-center-text')
                      ->url(fn ($record) => self::generateWhatsAppLink($record))
                      ->openUrlInNewTab(),
                  Tables\Actions\DeleteAction::make(),
              ]),
          ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function generateWhatsAppLink($record)
    {
        $phone = '/';
        $message = urlencode(
                  "Salam Budaya! Lestarikan!!\n\n" .
                  "Ada laporan baru terkait kebudayaan yang perlu perhatian kita bersama.\n" .
                  "Nama Kebudayaan : {$record->name}\n" .
                  "Berlokasi di : {$record->location}\n" .
                  "Deskripsi Singkat : {$record->description}\n" .
                  "Dilaporkan oleh : {$record->reporter}\n" .
                  "Tanggal Laporan : " . Carbon::parse($record->created_at)->translatedFormat('d M Y') . "\n\n" .
                  // "Klik di sini untuk melihat lebih lanjut: www.kpbgianyar.com/laporan \n".
                  "Salam Budaya! Lestarikan!!"
              );

        return "https://wa.me/$phone?text=$message";
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLapors::route('/'),
            // 'create' => Pages\CreateLapor::route('/create'),
            'edit' => Pages\EditLapor::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}