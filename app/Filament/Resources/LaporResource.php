<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporResource\Pages;
use App\Filament\Resources\LaporResource\RelationManagers;
use App\Models\Lapor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
                //
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
              TextColumn::make('created_at')
                ->label('Tanggal Laporan'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            // 'edit' => Pages\EditLapor::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
