<?php

namespace App\Filament\Resources\Answers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AnswersForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('question_id')
                    ->relationship('question', 'id')
                    ->required(),
                Textarea::make('answer_text')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('is_correct')
                    ->required(),
            ]);
    }
}
