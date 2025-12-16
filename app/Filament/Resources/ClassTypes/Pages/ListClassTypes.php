<?php

namespace App\Filament\Resources\ClassTypes\Pages;

use App\Filament\Resources\ClassTypes\ClassTypeResource;
use App\Filament\Resources\ClassTypes\Widgets\ClassTypeStatsOverview;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClassTypes extends ListRecords
{
    protected static string $resource = ClassTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->icon('heroicon-o-plus')
                ->label('Tipe Kelas Baru'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            ClassTypeStatsOverview::class,
        ];
    }
}
