<?php

namespace App\Filament\Resources\Answers\Pages;

use App\Filament\Resources\Answers\AnswersResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAnswers extends EditRecord
{
    protected static string $resource = AnswersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
