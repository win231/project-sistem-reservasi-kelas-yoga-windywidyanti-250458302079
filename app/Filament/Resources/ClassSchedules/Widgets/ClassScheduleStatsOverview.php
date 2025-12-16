<?php

namespace App\Filament\Resources\ClassSchedules\Widgets;

use App\Models\ClassSchedule;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ClassScheduleStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $now = now();
        
        return [
            Stat::make('Total Jadwal', ClassSchedule::count())
                ->description('Semua jadwal kelas')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('info'),
            
            Stat::make('Jadwal Aktif', ClassSchedule::where('start_time', '>=', $now)->count())
                ->description('Jadwal yang akan datang')
                ->descriptionIcon('heroicon-o-clock')
                ->color('success'),
            
            Stat::make('Jadwal Penuh', ClassSchedule::whereHas('bookings', function($query) {
                    $query->where('status', 'confirmed');
                })
                ->withCount(['bookings' => function($query) {
                    $query->where('status', 'confirmed');
                }])
                ->get()
                ->filter(function($schedule) {
                    return $schedule->bookings_count >= $schedule->max_capacity;
                })
                ->count())
                ->description('Kelas sudah penuh')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('danger'),
            
            Stat::make('Jadwal Tersedia', ClassSchedule::where('start_time', '>=', $now)
                ->whereHas('bookings', function($query) {
                    $query->where('status', 'confirmed');
                }, '<', function($query) {
                    return $query->selectRaw('max_capacity');
                })
                ->orWhereDoesntHave('bookings')
                ->count())
                ->description('Masih ada slot tersedia')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('warning'),
        ];
    }

    protected function getColumns(): int
    {
        return 4;
    }
}
