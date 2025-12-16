<?php

namespace App\Filament\Resources\Instructors\Pages;

use App\Filament\Resources\Instructors\InstructorResource;
use App\Filament\Resources\Instructors\Widgets\InstructorStatsOverview;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListInstructors extends ListRecords
{
    protected static string $resource = InstructorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->icon('heroicon-o-plus')
                ->label('Instruktur Baru'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            InstructorStatsOverview::class,
        ];
    }
}
 