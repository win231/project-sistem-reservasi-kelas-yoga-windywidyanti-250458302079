<?php

namespace App\Filament\Instructor\Resources\ClassScheduleResource\Pages;

use App\Filament\Instructor\Resources\ClassScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditClassSchedule extends EditRecord
{
    protected static string $resource = ClassScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}