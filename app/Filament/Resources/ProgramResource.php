<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Models\Program;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-calendar';

    protected static string|\UnitEnum|null $navigationGroup = 'Konten';

    protected static ?string $modelLabel = 'Program';

    protected static ?string $pluralModelLabel = 'Program & Jadwal';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('Informasi Program')->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Program')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, $set) => $set('slug', str($state)->slug())),
                Forms\Components\TextInput::make('slug')->label('Slug')->required()->unique(ignoreRecord: true),
                Forms\Components\Select::make('format')->label('Format')->options(['Online' => 'Online', 'Offline' => 'Offline', 'Hybrid' => 'Hybrid']),
                Forms\Components\TextInput::make('location')->label('Lokasi'),
                Forms\Components\DatePicker::make('start_date')->label('Mulai'),
                Forms\Components\DatePicker::make('end_date')->label('Selesai'),
                Forms\Components\TextInput::make('price')->label('Harga (Rp)')->numeric()->prefix('Rp')->nullable(),
                Forms\Components\TextInput::make('quota')->label('Kuota')->numeric()->nullable(),
                Forms\Components\TextInput::make('registration_link')->label('Link Pendaftaran')->url(),
                Forms\Components\FileUpload::make('thumbnail')->label('Gambar')->image()->disk('public')->directory('programs'),
                Forms\Components\Textarea::make('description')->label('Deskripsi')->rows(3)->columnSpanFull(),
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
                Tables\Columns\TextColumn::make('format')->label('Format')->badge(),
                Tables\Columns\TextColumn::make('start_date')->label('Mulai')->date('d M Y')->sortable(),
                Tables\Columns\TextColumn::make('price')->label('Harga')->money('IDR'),
                Tables\Columns\ToggleColumn::make('is_active')->label('Aktif'),
            ])
            ->defaultSort('start_date')
            ->actions([EditAction::make(), DeleteAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}
