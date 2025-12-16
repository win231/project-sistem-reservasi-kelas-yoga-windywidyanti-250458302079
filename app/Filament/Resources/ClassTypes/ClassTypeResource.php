<?php

namespace App\Filament\Resources\ClassTypes;

use App\Filament\Resources\ClassTypes\Pages\CreateClassType;
use App\Filament\Resources\ClassTypes\Pages\EditClassType;
use App\Filament\Resources\ClassTypes\Pages\ListClassTypes;
use App\Filament\Resources\ClassTypes\Schemas\ClassTypeForm;
use App\Filament\Resources\ClassTypes\Tables\ClassTypesTable;
use App\Models\ClassType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ClassTypeResource extends Resource
{
    protected static ?string $model = ClassType::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-tag';

    protected static ?string $recordTitleAttribute = 'Tipe Kelas';

    public static function form(Schema $schema): Schema
    {
        return ClassTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClassTypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListClassTypes::route('/'),
        ];
    }
}
