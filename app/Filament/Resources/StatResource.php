<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatResource\Pages;
use App\Models\Stat;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class StatResource extends Resource
{
    protected static ?string $model = Stat::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar';

    protected static string|\UnitEnum|null $navigationGroup = 'Konten';

    protected static ?string $modelLabel = 'Statistik';

    protected static ?string $pluralModelLabel = 'Statistik';

    protected static ?int $navigationSort = 8;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('label')->label('Label')->required()->placeholder('Proyek Konsultasi'),
            Forms\Components\TextInput::make('value')->label('Nilai')->required()->placeholder('150+'),
            Forms\Components\TextInput::make('sort_order')->label('Urutan')->numeric()->default(0),
            Forms\Components\Toggle::make('is_active')->label('Aktif')->default(true),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sort_order')->label('#')->sortable(),
                Tables\Columns\TextColumn::make('value')->label('Nilai'),
                Tables\Columns\TextColumn::make('label')->label('Label'),
                Tables\Columns\ToggleColumn::make('is_active')->label('Aktif'),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->actions([EditAction::make(), DeleteAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStats::route('/'),
            'create' => Pages\CreateStat::route('/create'),
            'edit' => Pages\EditStat::route('/{record}/edit'),
        ];
    }
}
