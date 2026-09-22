<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Infolists;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-envelope';

    protected static string|\UnitEnum|null $navigationGroup = 'Operasional';

    protected static ?string $modelLabel = 'Pesan';

    protected static ?string $pluralModelLabel = 'Pesan Masuk';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('is_read', false)->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema->schema([
            Section::make('Detail Pengirim')->schema([
                Infolists\Components\TextEntry::make('name')->label('Nama'),
                Infolists\Components\TextEntry::make('email')->label('Email'),
                Infolists\Components\TextEntry::make('phone')->label('No. HP'),
                Infolists\Components\TextEntry::make('organization')->label('Organisasi'),
                Infolists\Components\TextEntry::make('service_interest')->label('Layanan yang Diminati'),
                Infolists\Components\TextEntry::make('subject')->label('Subjek'),
                Infolists\Components\TextEntry::make('message')->label('Pesan')->columnSpanFull(),
                Infolists\Components\TextEntry::make('created_at')->label('Dikirim')->dateTime('d M Y, H:i'),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('is_read')->label('Baca')->boolean(),
                Tables\Columns\TextColumn::make('name')->label('Nama')->searchable(),
                Tables\Columns\TextColumn::make('email')->label('Email')->searchable(),
                Tables\Columns\TextColumn::make('subject')->label('Subjek')->limit(40),
                Tables\Columns\TextColumn::make('service_interest')->label('Layanan'),
                Tables\Columns\TextColumn::make('created_at')->label('Tanggal')->date('d M Y')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                \Filament\Actions\ActionGroup::make([
                    ViewAction::make(),
                    
                    Action::make('whatsapp')
                        ->label('Chat WA')
                        ->icon('heroicon-o-chat-bubble-oval-left')
                        ->color('success')
                        ->url(function (Contact $record) {
                            $phone = preg_replace('/[^0-9]/', '', (string) $record->phone);
                            if (str_starts_with($phone, '0')) {
                                $phone = '62' . substr($phone, 1);
                            }
                            $text = urlencode("Halo {$record->name}, saya dari Airlangga Consulting. Menindaklanjuti pesan Anda terkait {$record->service_interest}...");
                            return "https://wa.me/{$phone}?text={$text}";
                        })
                        ->openUrlInNewTab()
                        ->visible(fn (Contact $record) => !empty($record->phone)),
                        
                    Action::make('email')
                        ->label('Balas Email')
                        ->icon('heroicon-o-envelope')
                        ->color('info')
                        ->url(fn (Contact $record) => "mailto:{$record->email}?subject=" . urlencode("Tanggapan dari Airlangga Consulting: {$record->subject}"))
                        ->openUrlInNewTab()
                        ->visible(fn (Contact $record) => !empty($record->email)),

                    Action::make('markRead')
                        ->label('Tandai Dibaca')
                        ->icon('heroicon-o-check')
                        ->action(fn (Contact $record) => $record->markAsRead())
                        ->visible(fn (Contact $record) => ! $record->is_read),
                        
                    DeleteAction::make(),
                ])->tooltip('Pilihan Aksi'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'view' => Pages\ViewContact::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
