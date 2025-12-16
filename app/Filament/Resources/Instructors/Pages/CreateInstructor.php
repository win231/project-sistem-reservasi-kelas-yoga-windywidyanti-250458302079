<?php

namespace App\Filament\Resources\Instructors\Pages;

use App\Filament\Resources\Instructors\InstructorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInstructor extends CreateRecord
{
    protected static string $resource = InstructorResource::class;

    protected function getRedirectUrl(): string
    {
        // ini buat balik ke list habis ngedit
        return $this->getResource()::getUrl('index');
    }
}
