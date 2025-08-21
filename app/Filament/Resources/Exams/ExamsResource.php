<?php

namespace App\Filament\Resources\Exams;

use App\Filament\Resources\Exams\Pages\CreateExams;
use App\Filament\Resources\Exams\Pages\EditExams;
use App\Filament\Resources\Exams\Pages\ListExams;
use App\Filament\Resources\Exams\Schemas\ExamsForm;
use App\Filament\Resources\Exams\Tables\ExamsTable;
use App\Models\Exams;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ExamsResource extends Resource
{
    protected static ?string $model = Exams::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ExamsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExamsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            // Exam belongs to Course
            // Exam has many Questions
            // Exam has many ExamAttempts
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListExams::route('/'),
            'create' => CreateExams::route('/create'),
            'edit' => EditExams::route('/{record}/edit'),
        ];
    }
}
