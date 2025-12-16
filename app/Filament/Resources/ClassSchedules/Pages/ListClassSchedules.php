<?php

namespace App\Filament\Resources\ClassSchedules\Pages;

use App\Filament\Resources\ClassSchedules\ClassScheduleResource;
use App\Filament\Resources\ClassSchedules\Widgets\ClassScheduleStatsOverview;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClassSchedules extends ListRecords
{
    protected static string $resource = ClassScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->icon('heroicon-o-plus')
                ->label('Jadwal Baru'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ClassScheduleStatsOverview::class,
        ];
    }
}
