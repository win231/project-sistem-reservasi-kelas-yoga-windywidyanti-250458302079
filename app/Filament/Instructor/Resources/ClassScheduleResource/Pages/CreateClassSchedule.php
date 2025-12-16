<?php

namespace App\Filament\Instructor\Resources\ClassScheduleResource\Pages;

use App\Filament\Instructor\Resources\ClassScheduleResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateClassSchedule extends CreateRecord
{
    protected static string $resource = ClassScheduleResource::class;
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['instructor_id'] = Auth::id();
        
        return $data;
    }
}