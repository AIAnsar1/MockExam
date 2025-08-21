<?php

namespace App\Filament\Resources\ExamAttempts;

use App\Filament\Resources\ExamAttempts\Pages\CreateExamAttempts;
use App\Filament\Resources\ExamAttempts\Pages\EditExamAttempts;
use App\Filament\Resources\ExamAttempts\Pages\ListExamAttempts;
use App\Filament\Resources\ExamAttempts\Schemas\ExamAttemptsForm;
use App\Filament\Resources\ExamAttempts\Tables\ExamAttemptsTable;
use App\Models\ExamAttempts;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ExamAttemptsResource extends Resource
{
    protected static ?string $model = ExamAttempts::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ExamAttemptsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExamAttemptsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            // ExamAttempt belongs to Exam
            // ExamAttempt belongs to User
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListExamAttempts::route('/'),
            'create' => CreateExamAttempts::route('/create'),
            'edit' => EditExamAttempts::route('/{record}/edit'),
        ];
    }
}
