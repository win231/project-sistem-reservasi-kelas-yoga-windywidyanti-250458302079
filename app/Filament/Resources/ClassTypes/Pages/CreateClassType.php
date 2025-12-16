<?php

namespace App\Filament\Resources\ClassTypes\Pages;

use App\Filament\Resources\ClassTypes\ClassTypeResource;
use Filament\Resources\Pages\CreateRecord;

class CreateClassType extends CreateRecord
{
    protected static string $resource = ClassTypeResource::class;

    protected function getRedirectUrl(): string
    {
        // ini buat balik ke list habis ngedit
        return $this->getResource()::getUrl('index');
    }
}
