<?php

namespace App\Filament\Resources\ServiceResource\RelationManagers;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $title = 'Sub-Layanan';

    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nama Sub-Layanan')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn (string $state, Forms\Set $set) => $set('slug', str($state)->slug())
                ),
            Forms\Components\TextInput::make('slug')
                ->label('Slug')
                ->required()
                ->unique(ignoreRecord: true),
            Forms\Components\Textarea::make('description')->label('Deskripsi')->rows(2),
            Forms\Components\RichEditor::make('content')->label('Konten Lengkap')->columnSpanFull(),
            Forms\Components\TextInput::make('sort_order')->label('Urutan')->numeric()->default(0),
            Forms\Components\Toggle::make('is_active')->label('Aktif')->default(true),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sort_order')->label('#')->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Nama')->searchable(),
                Tables\Columns\ToggleColumn::make('is_active')->label('Aktif'),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->headerActions([CreateAction::make()])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
