<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create'),
                \Filament\Forms\Components\Select::make('role')
                    ->options([
                        'super_admin' => 'Super Admin (Bisa Akses Dashboard)',
                        'user' => 'User Biasa (Hanya Balas Diskusi Publik)',
                    ])
                    ->required()
                    ->default('user'),
            ]);
    }
}
