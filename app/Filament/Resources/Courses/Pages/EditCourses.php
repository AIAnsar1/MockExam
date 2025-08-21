<?php

namespace App\Filament\Resources\Courses\Pages;

use App\Filament\Resources\Courses\CoursesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCourses extends EditRecord
{
    protected static string $resource = CoursesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
