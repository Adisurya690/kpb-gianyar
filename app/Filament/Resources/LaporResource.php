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
use Filament\Forms\Components\FileUpload;
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
              FileUpload::make('image')
                ->label('Gambar'),
              TextInput::make('description')
                ->readOnly(),
              TextInput::make('reporter')
                ->readOnly(),
                Select::make('status')
                ->options([
                    'Laporan Dikirim' => 'Laporan Dikirim',
                    'Laporan Telah Dibaca' => 'Laporan Telah Dibaca',
                    'Laporan Ditinjau' => 'Laporan Ditinjau',
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
            
                    // Kirim email notifikasi ke user
                    $userEmail = $record->user->email ?? null;
                    if ($userEmail) {
                        Mail::to($userEmail)->send(new ReportStatusUpdatedMail($record));
                    } else {
                        Log::warning('User email not found for record ID ' . $record->id);
                    }
                }),
            
            Textarea::make('note')
                ->label('Catatan Perubahan Status')
                ->nullable()                                                                                                        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              TextColumn::make('name')
              ->label('Nama Kebudayaan')
              ->searchable(),
              TextColumn::make('location')
              ->label('Lokasi'),
              ImageColumn::make('image')
                ->label('Gambar'),
              TextColumn::make('description')
                ->label('Deskripsi'),
              TextColumn::make('reporter')
                ->label('Pelapor'),
              TextColumn::make('status')
                ->label('Status'),
              TextColumn::make('note')
                ->label('Catatan'),
              TextColumn::make('created_at')
                ->label('Tanggal Laporan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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