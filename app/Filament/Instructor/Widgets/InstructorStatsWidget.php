<?php

namespace App\Filament\Instructor\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\ClassSchedule;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class InstructorStatsWidget extends BaseWidget
{
    protected static ?int $sort = 3;
    
    protected int|string|array $columnSpan = 'full';

    protected function getStats(): array
    {
        $instructorId = Auth::id();
        
        // Total Jadwal
        $totalJadwal = ClassSchedule::where('instructor_id', $instructorId)->count();
        
        // Jadwal Mendatang
        $jadwalMendatang = ClassSchedule::where('instructor_id', $instructorId)
            ->where('start_time', '>', now())
            ->count();
        
        // Total Ulasan
        $totalUlasan = Review::whereHas('booking.classSchedule', function($query) use ($instructorId) {
            $query->where('instructor_id', $instructorId);
        })->count();
        
        // Rata-rata Rating
        $avgRating = Review::whereHas('booking.classSchedule', function($query) use ($instructorId) {
            $query->where('instructor_id', $instructorId);
        })->avg('rating');
        
        $avgRating = $avgRating ? round($avgRating, 1) : 0;

        return [
            Stat::make('Total Jadwal', $totalJadwal)
                ->description('Total semua jadwal kelas')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('success'),
                
            Stat::make('Jadwal Mendatang', $jadwalMendatang)
                ->description('Jadwal yang akan datang')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),
                
            Stat::make('Total Ulasan', $totalUlasan)
                ->description('Total ulasan dari member')
                ->descriptionIcon('heroicon-m-star')
                ->color('info'),
                
            Stat::make('Rata-rata Rating', $avgRating . ' / 5')
                ->description($avgRating > 0 ? str_repeat('⭐', (int)$avgRating) : '-')
                ->descriptionIcon('heroicon-o-trophy')
                ->color('primary'),
        ];
    }
}
