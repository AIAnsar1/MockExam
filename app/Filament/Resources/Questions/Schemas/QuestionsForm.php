<?php

namespace App\Filament\Resources\Questions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class QuestionsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('exam_id')
                    ->relationship('exam', 'title')
                    ->required(),
                Textarea::make('question_text')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('type')
                    ->required(),
            ]);
    }
}
