<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Support\Str;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $pluralModelLabel = "Galeri";

    protected static ?string $navigationGroup = "Konten";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              TextInput::make('name')
                ->label('Judul Album')
                ->required(),
              FileUpload::make('image')
                ->label('Gambar Sampul')
                ->image()
                ->directory('cover_album')
                ->visibility('public')
                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                  $uniqueName = Str::uuid();
                  $extension = $file->getClientOriginalExtension();         
                  return "{$uniqueName}." . strtolower($extension);
                }),
              TextInput::make('link')
              ->url(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              ImageColumn::make('image')
                ->label('Sampul Album')
                ->searchable(),
              TextColumn::make('name')
                ->label('Judul Album'),
              TextColumn::make('link'),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
