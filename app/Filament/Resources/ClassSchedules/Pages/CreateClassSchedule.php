<?php

namespace App\Filament\Resources\ClassSchedules\Pages;

use App\Filament\Resources\ClassSchedules\ClassScheduleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateClassSchedule extends CreateRecord
{
    protected static string $resource = ClassScheduleResource::class;

    protected function getRedirectUrl(): string
    {
        // ini buat balik ke list habis ngedit
        return $this->getResource()::getUrl('index');
    }
}
