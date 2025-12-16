<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Classes;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = 'full';

    protected function getStats(): array
    {
        return [
            Stat::make('Total Booking', Booking::count())
                ->description('Total semua booking')
                ->descriptionIcon('heroicon-o-calendar')
                ->color('success'),
            
            Stat::make('Total Kelas', Classes::count())
                ->description('Total kelas tersedia')
                ->descriptionIcon('heroicon-o-academic-cap')
                ->color('warning'),
            
            Stat::make('Total User', User::count())
                ->description('Total pengguna terdaftar')
                ->descriptionIcon('heroicon-o-users')
                ->color('primary'),
        ];
    }
}
