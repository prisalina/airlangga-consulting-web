<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static string|\UnitEnum|null $navigationGroup = 'Konten';

    protected static ?string $modelLabel = 'Testimoni';

    protected static ?string $pluralModelLabel = 'Testimoni';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make()->schema([
                Forms\Components\TextInput::make('name')->label('Nama')->required(),
                Forms\Components\TextInput::make('position')->label('Jabatan & Instansi')->required(),
                Forms\Components\FileUpload::make('photo')->label('Foto')->image()->directory('testimonials')->avatar(),
                Forms\Components\TextInput::make('sort_order')->label('Urutan')->numeric()->default(0),
                Forms\Components\Textarea::make('content')->label('Isi Testimoni')->required()->rows(4)->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')->label('Aktif')->default(true),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama')->searchable(),
                Tables\Columns\TextColumn::make('position')->label('Jabatan'),
                Tables\Columns\TextColumn::make('content')->label('Testimoni')->limit(60),
                Tables\Columns\TextColumn::make('sort_order')->label('#')->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')->label('Aktif'),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->actions([EditAction::make(), DeleteAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
