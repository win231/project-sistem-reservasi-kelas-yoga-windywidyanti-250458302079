<?php

namespace App\Filament\Resources\Classes\Pages;

use App\Filament\Resources\Classes\ClassesResource;
use App\Filament\Resources\Classes\Widgets\ClassesStatsOverview;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClasses extends ListRecords
{
    protected static string $resource = ClassesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->icon('heroicon-o-plus')
                ->label('Kelas Baru'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ClassesStatsOverview::class,
        ];
    }
}
