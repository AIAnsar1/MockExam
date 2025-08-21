<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('username')
                    ->required(),
                DatePicker::make('birth_date'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                DateTimePicker::make('phone_verified_at'),
                TextInput::make('role')
                    ->required()
                    ->default('user'),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
                TextInput::make('address'),
                TextInput::make('password')
                    ->password()
                    ->required(),
                Toggle::make('is_verified')
                    ->required(),
            ]);
    }
}
