<?php

namespace App\Filament\Resources\Instructors\Widgets;

use App\Models\Instructor;
use App\Models\ClassSchedule;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class InstructorStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $instructorUserIds = Instructor::pluck('user_id')->toArray();
        $activeInstructors = ClassSchedule::where('start_time', '>=', now())
            ->whereIn('instructor_id', $instructorUserIds)
            ->distinct('instructor_id')
            ->count('instructor_id');
            
        return [
            Stat::make('Total Instruktur', Instructor::count())
                ->description('Semua instruktur')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('info'),
            
            Stat::make('Instruktur Aktif', $activeInstructors)
                ->description('Memiliki jadwal aktif')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),
            
            Stat::make('Instruktur Berpengalaman', Instructor::whereNotNull('bio')->count())
                ->description('Memiliki bio/profil')
                ->descriptionIcon('heroicon-o-star')
                ->color('warning'),
            
            Stat::make('Total Jadwal', ClassSchedule::whereIn('instructor_id', $instructorUserIds)->count())
                ->description('Semua jadwal mengajar')
                ->descriptionIcon('heroicon-o-calendar-days')
                ->color('primary'),
        ];
    }

    protected function getColumns(): int
    {
        return 4;
    }
}
