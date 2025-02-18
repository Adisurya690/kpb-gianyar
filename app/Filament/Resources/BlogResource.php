<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
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
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralModelLabel = "Blog";

    protected static ?string $navigationGroup = "Konten";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              TextInput::make('title')
                ->label('Judul Blog')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
              TextInput::make('slug')
                ->required(),
              FileUpload::make('featured_image')
                ->label('Gambar')
                ->required()
                ->image()
                ->directory('blog_images')
                ->visibility('public')
                ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file) {
                  $uniqueName = Str::uuid();
                  $extension = $file->getClientOriginalExtension();         
                  return "{$uniqueName}." . strtolower($extension);
                }),
              TextInput::make('author')
                ->default(fn () => Auth::user()->nickname)
                ->readonly()
                ->label('Penulis'),
              RichEditor::make('content')
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
                TextColumn::make('title')
                  ->label('Judul Blog'),
                ImageColumn::make('featured_image')
                  ->label('Gambar'),
                TextColumn::make('author')
                  ->label('Penulis'),
                TextColumn::make('content')
                  ->label('Konten')
                  ->limit(20),
                TextColumn::make('meta_title'),
                TextColumn::make('meta_keyword'),
                TextColumn::make('meta_description')
                  ->limit(20),
                TextColumn::make('created_at')
                  ->label('Tanggal Posting')
                  ->dateTime()
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
