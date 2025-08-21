<?php

namespace App\Filament\Resources\Abouts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AboutForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('about_project')
                    ->required(),
                TextInput::make('teams')
                    ->required(),
                TextInput::make('social_media')
                    ->required(),
                TextInput::make('mission'),
                TextInput::make('contacts'),
                TextInput::make('partners'),
                TextInput::make('faq'),
                TextInput::make('policies'),
            ]);
    }
}
