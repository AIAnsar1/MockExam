<?php

namespace App\Filament\Resources\ExamAttempts\Pages;

use App\Filament\Resources\ExamAttempts\ExamAttemptsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditExamAttempts extends EditRecord
{
    protected static string $resource = ExamAttemptsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
