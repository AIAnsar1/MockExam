<?php

namespace App\Filament\Resources\Answers;

use App\Filament\Resources\Answers\Pages\CreateAnswers;
use App\Filament\Resources\Answers\Pages\EditAnswers;
use App\Filament\Resources\Answers\Pages\ListAnswers;
use App\Filament\Resources\Answers\Schemas\AnswersForm;
use App\Filament\Resources\Answers\Tables\AnswersTable;
use App\Models\Answers;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AnswersResource extends Resource
{
    protected static ?string $model = Answers::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AnswersForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AnswersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            // Answer belongs to Question
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAnswers::route('/'),
            'create' => CreateAnswers::route('/create'),
            'edit' => EditAnswers::route('/{record}/edit'),
        ];
    }
}
