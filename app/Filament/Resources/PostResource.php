<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use App\Models\PostCategory;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static string|\UnitEnum|null $navigationGroup = 'Konten';

    protected static ?string $modelLabel = 'Artikel';

    protected static ?string $pluralModelLabel = 'Blog & Artikel';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('Konten Artikel')->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $state, $set) => $set('slug', str($state)->slug())
                    )
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->columnSpanFull(),
                Forms\Components\Select::make('post_category_id')
                    ->label('Kategori')
                    ->options(PostCategory::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\DateTimePicker::make('published_at')
                    ->label('Tanggal Publikasi'),
                Forms\Components\Textarea::make('excerpt')
                    ->label('Ringkasan')
                    ->rows(3)
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('content')
                    ->label('Konten')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('thumbnail')
                    ->label('Gambar Utama')
                    ->image()
                    ->disk('public')
                    ->directory('posts')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')->label('Aktif')->default(true),
            ])->columns(2),
            Section::make('SEO')->schema([
                Forms\Components\TextInput::make('meta_title')->label('Meta Title'),
                Forms\Components\Textarea::make('meta_description')->label('Meta Description')->rows(2),
            ])->columns(1)->collapsed(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')->label('Gambar')->square(),
                Tables\Columns\TextColumn::make('title')->label('Judul')->searchable()->limit(50),
                Tables\Columns\TextColumn::make('category.name')->label('Kategori'),
                Tables\Columns\TextColumn::make('published_at')->label('Terbit')->date('d M Y')->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')->label('Aktif'),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('post_category_id')
                    ->label('Kategori')
                    ->options(PostCategory::all()->pluck('name', 'id')),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
