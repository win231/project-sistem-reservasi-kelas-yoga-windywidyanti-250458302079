<?php

namespace App\Filament\Instructor\Resources\ReviewResource\Pages;

use App\Filament\Instructor\Resources\ReviewResource;
use Filament\Resources\Pages\ViewRecord;

class ViewReview extends ViewRecord
{
    protected static string $resource = ReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}