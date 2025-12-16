<?php

namespace App\Filament\Resources\ClassTypes\Widgets;

use App\Models\ClassType;
use App\Models\Classes;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ClassTypeStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Tipe Kelas', ClassType::count())
                ->description('Semua tipe kelas')
                ->descriptionIcon('heroicon-o-tag')
                ->color('info'),
            
            Stat::make('Tipe Aktif', ClassType::whereHas('classes')->count())
                ->description('Tipe yang memiliki kelas')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),
            
            Stat::make('Tipe Tidak Aktif', ClassType::whereDoesntHave('classes')->count())
                ->description('Belum ada kelas')
                ->descriptionIcon('heroicon-o-x-circle')
                ->color('warning'),
            
            Stat::make('Total Kelas', Classes::count())
                ->description('Dari semua tipe')
                ->descriptionIcon('heroicon-o-squares-2x2')
                ->color('primary'),
        ];
    }

    protected function getColumns(): int
    {
        return 4;
    }
}
