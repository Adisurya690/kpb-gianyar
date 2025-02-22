<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KebudayaanResource\Pages;
use App\Filament\Resources\KebudayaanResource\RelationManagers;
use App\Models\Kebudayaan;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class KebudayaanResource extends Resource
{
    protected static ?string $model = Kebudayaan::class;

    protected static ?string $pluralModelLabel = "Kebudayaan";

    protected static ?string $navigationGroup = "Konten";

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              TextInput::make('name')
                ->label('Nama Kebudayaan')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
              TextInput::make('slug')
                ->required(),
              TextInput::make('location')
                ->required()
                ->label('Lokasi'),
              Select::make('category')
                ->label('Kategori')
                ->required()
                ->placeholder('Pilih opsi')
                ->options([
                    'Benda' => 'Benda',
                    'Tak Benda' => 'Tak Benda',
                ])
                ->native(false),
                Repeater::make('images') // Relasi ke tabel kebudayaan_images
                ->label('Gambar Kebudayaan')
                ->relationship('images') // Hubungkan dengan tabel kebudayaan_images
                ->schema([
                    FileUpload::make('path') // Kolom 'path' di kebudayaan_images
                        ->label('Upload Gambar')
                        ->image()
                        ->disk('public')
                        ->directory('kebudayaan_images') // Simpan di folder storage/app/public/kebudayaan_images
                        ->visibility('public')
                        ->getUploadedFileNameForStorageUsing(fn ($file) => Str::uuid() . '.' . $file->getClientOriginalExtension())
                ])
                ->columns(2), // Tampilkan dalam 2 kolom biar rapi
              RichEditor::make('description')
                ->label('Deskripsi')
                ->required()
                ->columnSpan(2)
                ->toolbarButtons([
                    'attachFiles',
                    'blockquote',
                    'bold',
                    'bulletList',
                    'codeBlock',
                    'h2',
                    'h3',
                    'italic',
                    'link',
                    'orderedList',
                    'redo',
                    'strike',
                    'underline',
                    'undo',
                ]),
              TextInput::make('meta_title')
                ->required(),
              TextInput::make('meta_keyword')
                ->required(),
              Textarea::make('meta_description')
                ->required()
                ->autosize(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              ImageColumn::make('images')
                ->label('Gambar')
                ->getStateUsing(fn ($record) => $record->images->pluck('path')->map(fn ($path) => asset('storage/' . $path))->toArray()) // Ambil semua gambar
                ->stacked() // Agar gambar ditampilkan secara vertikal
                ->limit(3), // Batas jumlah gambar yang ditampilkan
              TextColumn::make('name')
                ->label('Nama Kebudayaan'),
              TextColumn::make('location')
                ->label('Lokasi'),
              TextColumn::make('description')
                ->label('Deskripsi')
                ->limit(20),
              // TextColumn::make('meta_title'),
              // TextColumn::make('meta_keyword'),
              // TextColumn::make('meta_description')
              //   ->limit(20),
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
            'index' => Pages\ListKebudayaans::route('/'),
            'create' => Pages\CreateKebudayaan::route('/create'),
            'edit' => Pages\EditKebudayaan::route('/{record}/edit'),
        ];
    }
}
