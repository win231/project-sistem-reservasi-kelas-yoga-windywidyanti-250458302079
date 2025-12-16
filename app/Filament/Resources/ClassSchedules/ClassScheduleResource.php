<?php

namespace App\Filament\Resources\ClassSchedules;

use App\Filament\Resources\ClassSchedules\Pages\CreateClassSchedule;
use App\Filament\Resources\ClassSchedules\Pages\EditClassSchedule;
use App\Filament\Resources\ClassSchedules\Pages\ListClassSchedules;
use App\Filament\Resources\ClassSchedules\Schemas\ClassScheduleForm;
use App\Filament\Resources\ClassSchedules\Tables\ClassScheduleTable;
use App\Models\ClassSchedule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ClassScheduleResource extends Resource
{
    protected static ?string $model = ClassSchedule::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $recordTitleAttribute = 'Jadwal Kelas';

    public static function form(Schema $schema): Schema
    {
        return ClassScheduleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClassScheduleTable::configure($table);
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
            'index' => ListClassSchedules::route('/'),
        ];
    }
}
