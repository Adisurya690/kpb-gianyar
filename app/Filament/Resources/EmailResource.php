<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmailResource\Pages;
use App\Filament\Resources\EmailResource\RelationManagers;
use App\Models\Email;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmailResource extends Resource
{
    protected static ?string $model = Email::class;

    protected static ?string $navigationIcon = 'heroicon-o-at-symbol';

    protected static ?string $pluralModelLabel = "Email Admin";

    // protected static ?string $navigationGroup = "Manajemen Pengguna";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              TextInput::make('email_name')
                ->required()
                ->label('Nama'),
              TextInput::make('email')
                ->email()
                ->required()
                ->label('Email'),
              Select::make('email_active_status')
                ->label('Status Email')
                ->options([
                    'Aktif' => 'Aktif',
                    'Nonaktif' => 'Nonaktif',
                ])
                ->native(false)
                ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              TextColumn::make('email_name')
                ->label('Nama'),
              TextColumn::make('email')
                ->searchable()
                ->label('Email'),
              TextColumn::make('email_active_status')
                ->searchable()
                ->label('Status Email')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Aktif' => 'warning',
                    'Nonaktif' => 'gray',
                })
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
            'index' => Pages\ListEmails::route('/'),
            'create' => Pages\CreateEmail::route('/create'),
            'edit' => Pages\EditEmail::route('/{record}/edit'),
        ];
    }
}
