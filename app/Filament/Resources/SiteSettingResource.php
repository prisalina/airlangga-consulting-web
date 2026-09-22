<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteSettingResource\Pages;
use App\Models\SiteSetting;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class SiteSettingResource extends Resource
{
    protected static ?string $model = SiteSetting::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string|\UnitEnum|null $navigationGroup = 'Pengaturan';

    protected static ?string $modelLabel = 'Pengaturan';

    protected static ?string $pluralModelLabel = 'Pengaturan Situs';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('key')->label('Key')->required()->unique(ignoreRecord: true),
            Forms\Components\Textarea::make('value')->label('Nilai')->rows(3),
        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('key')->label('Key')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('value')->label('Nilai')->limit(80),
                Tables\Columns\TextColumn::make('updated_at')->label('Diperbarui')->since()->sortable(),
            ])
            ->actions([EditAction::make(), DeleteAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteSettings::route('/'),
            'create' => Pages\CreateSiteSetting::route('/create'),
            'edit' => Pages\EditSiteSetting::route('/{record}/edit'),
        ];
    }
}
