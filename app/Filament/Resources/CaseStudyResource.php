<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CaseStudyResource\Pages;
use App\Models\CaseStudy;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class CaseStudyResource extends Resource
{
    protected static ?string $model = CaseStudy::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-folder-open';

    protected static string|\UnitEnum|null $navigationGroup = 'Konten';

    protected static ?string $modelLabel = 'Studi Kasus';

    protected static ?string $pluralModelLabel = 'Studi Kasus';

    protected static ?int $navigationSort = 10;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make()->schema([
                Forms\Components\TextInput::make('title')->label('Judul')->required()->live(onBlur: true)->afterStateUpdated(fn ($state, $set) => $set('slug', str($state)->slug())),
                Forms\Components\TextInput::make('slug')->label('Slug')->required()->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('client')->label('Klien')->nullable(),
                Forms\Components\TextInput::make('sector')->label('Sektor')->nullable(),
                Forms\Components\TextInput::make('service_type')->label('Jenis Layanan')->nullable(),
                Forms\Components\DatePicker::make('completed_at')->label('Selesai'),
                Forms\Components\FileUpload::make('thumbnail')->label('Gambar')->image()->disk('public')->directory('case-studies'),
                Forms\Components\Textarea::make('excerpt')->label('Ringkasan')->rows(3)->columnSpanFull(),
                Forms\Components\RichEditor::make('content')->label('Konten Lengkap')->columnSpanFull(),
                Forms\Components\Toggle::make('is_active')->label('Aktif')->default(true),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')->label('Gambar'),
                Tables\Columns\TextColumn::make('title')->label('Judul')->searchable(),
                Tables\Columns\TextColumn::make('client')->label('Klien'),
                Tables\Columns\TextColumn::make('sector')->label('Sektor'),
                Tables\Columns\TextColumn::make('completed_at')->label('Selesai')->date('d M Y'),
                Tables\Columns\ToggleColumn::make('is_active')->label('Aktif'),
            ])
            ->defaultSort('completed_at', 'desc')
            ->actions([EditAction::make(), DeleteAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCaseStudies::route('/'),
            'create' => Pages\CreateCaseStudy::route('/create'),
            'edit' => Pages\EditCaseStudy::route('/{record}/edit'),
        ];
    }
}
