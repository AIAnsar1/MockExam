<?php

namespace App\Filament\Resources\Answers\Pages;

use App\Filament\Resources\Answers\AnswersResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAnswers extends ListRecords
{
    protected static string $resource = AnswersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
