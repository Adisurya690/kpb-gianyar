<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $pluralModelLabel = "Pengguna";

    protected static ?string $navigationGroup = "Manajemen Pengguna";

    public static function form(Form $form): Form
    {
      return $form
          ->schema([
              Grid::make(1)->schema([
                  FileUpload::make('profile_picture')
                      ->label('Foto Profil')
                      ->image()
                      ->avatar()
                      ->imageEditor()
                      ->imageEditorAspectRatios([
                          '1:1' => 'Square (1:1)',
                        ])
                      ->directory('avatar_user')
                      ->visibility('public')
                      ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                          $uniqueName = Str::uuid();
                          $extension = $file->getClientOriginalExtension();
                          return "{$uniqueName}." . strtolower($extension);
                        }),
              ]),
              Grid::make(2)->schema([
                  TextInput::make('name')
                      ->label('Nama Lengkap')
                      ->required(),
                  TextInput::make('nickname')
                      ->label('Nama Panggilan')    
                      ->required(),
                  TextInput::make('email')
                      ->required(),
                  TextInput::make('password')
                      ->password()
                      ->required(),
                  TextInput::make('phone_number')
                      ->label('No Telephone')
                      ->required(),
                  Textarea::make('address')
                      ->label('Alamat')
                      ->required(),
              ]),
          ]);
  
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
              ImageColumn::make('profile_picture')
                ->label('Foto Profil')
                ->circular()
                ->defaultImageUrl(url('https://t4.ftcdn.net/jpg/00/64/67/63/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.jpg')),
              TextColumn::make('name')
                ->label('Nama')
                ->searchable()
                ->formatStateUsing(fn ($record) => "
                    <div>
                        <strong>{$record->nickname}</strong><br>
                        {$record->name}
                    </div>
                ")
                ->html(),            
              TextColumn::make('email')
                ->searchable(),
              TextColumn::make('phone_number')
                ->searchable()
                ->label('No Telepon'),
              TextColumn::make('address')
                ->searchable()
                ->label('Alamat'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
