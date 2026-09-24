<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-briefcase';

    protected static string|\UnitEnum|null $navigationGroup = 'Konten';

    protected static ?string $modelLabel = 'Layanan';

    protected static ?string $pluralModelLabel = 'Layanan';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('Informasi Layanan')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Layanan')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (string $state, $set) => $set('slug', str($state)->slug())
                        ),
                    Forms\Components\TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->unique(ignoreRecord: true),
                    Forms\Components\Textarea::make('short_description')
                        ->label('Deskripsi Singkat')
                        ->rows(2),
                    Forms\Components\Textarea::make('description')
                        ->label('Deskripsi')
                        ->rows(3),
                    Forms\Components\RichEditor::make('content')
                        ->label('Konten Lengkap')
                        ->columnSpanFull(),
                    Forms\Components\FileUpload::make('image')
                        ->label('Gambar')
                        ->image()
                        ->directory('services')
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('icon')
                        ->label('Icon (SVG/FA class)')
                        ->placeholder('fa-solid fa-briefcase'),
                    Forms\Components\TextInput::make('sort_order')
                        ->label('Urutan')
                        ->numeric()
                        ->default(0),
                    Forms\Components\Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sort_order')->label('#')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Nama')->searchable(),
                Tables\Columns\TextColumn::make('items_count')
                    ->label('Sub-Layanan')
                    ->counts('items'),
                Tables\Columns\ToggleColumn::make('is_active')->label('Aktif'),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ServiceResource\RelationManagers\ItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
