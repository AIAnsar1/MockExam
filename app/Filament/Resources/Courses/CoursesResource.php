<?php

namespace App\Filament\Resources\Courses;

use App\Filament\Resources\Courses\Pages\CreateCourses;
use App\Filament\Resources\Courses\Pages\EditCourses;
use App\Filament\Resources\Courses\Pages\ListCourses;
use App\Filament\Resources\Courses\Schemas\CoursesForm;
use App\Filament\Resources\Courses\Tables\CoursesTable;
use App\Models\Courses;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CoursesResource extends Resource
{
    protected static ?string $model = Courses::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return CoursesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CoursesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            // Course belongs to User (created_by)
            // Course has many Exams
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCourses::route('/'),
            'create' => CreateCourses::route('/create'),
            'edit' => EditCourses::route('/{record}/edit'),
        ];
    }
}
