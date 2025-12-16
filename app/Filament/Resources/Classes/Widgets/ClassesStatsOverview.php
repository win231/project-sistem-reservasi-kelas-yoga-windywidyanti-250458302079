<?php

namespace App\Filament\Resources\Classes\Widgets;

use App\Models\Classes;
use App\Models\ClassSchedule;
use App\Models\ClassType;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ClassesStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $activeClasses = ClassSchedule::where('start_time', '>=', now())
            ->distinct('class_id')
            ->count('class_id');
            
        return [
            Stat::make('Total Kelas', Classes::count())
                ->description('Semua kelas')
                ->descriptionIcon('heroicon-o-academic-cap')
                ->color('info'),
            
            Stat::make('Kelas Aktif', $activeClasses)
                ->description('Memiliki jadwal aktif')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),
            
            Stat::make('Total Jadwal', ClassSchedule::count())
                ->description('Semua jadwal kelas')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('warning'),
            
            Stat::make('Tipe Kelas', ClassType::count())
                ->description('Kategori kelas')
                ->descriptionIcon('heroicon-o-tag')
                ->color('primary'),
        ];
    }

    protected function getColumns(): int
    {
        return 4;
    }
}
