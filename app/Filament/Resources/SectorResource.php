<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectorResource\Pages;
use App\Models\Sector;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class SectorResource extends Resource
{
    protected static ?string $model = Sector::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-building-office';

    protected static string|\UnitEnum|null $navigationGroup = 'Konten';

    protected static ?string $modelLabel = 'Sektor';

    protected static ?string $pluralModelLabel = 'Sektor Klien';

    protected static ?int $navigationSort = 7;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('name')->label('Nama Sektor')->required(),
            Forms\Components\TextInput::make('sort_order')->label('Urutan')->numeric()->default(0),
            Forms\Components\Toggle::make('is_active')->label('Aktif')->default(true),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sort_order')->label('#')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Sektor')->searchable(),
                Tables\Columns\ToggleColumn::make('is_active')->label('Aktif'),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->actions([EditAction::make(), DeleteAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSectors::route('/'),
            'create' => Pages\CreateSector::route('/create'),
            'edit' => Pages\EditSector::route('/{record}/edit'),
        ];
    }
}
