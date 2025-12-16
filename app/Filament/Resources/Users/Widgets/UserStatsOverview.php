<?php

namespace App\Filament\Resources\Users\Widgets;

use App\Models\User;
use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total User', User::count())
                ->description('Semua pengguna')
                ->descriptionIcon('heroicon-o-users')
                ->color('info'),
            
            Stat::make('Admin', User::where('role', 'admin')->count())
                ->description('Pengguna admin')
                ->descriptionIcon('heroicon-o-shield-check')
                ->color('danger'),
            
            Stat::make('Instructor', User::where('role', 'instructor')->count())
                ->description('Pengguna instructor')
                ->descriptionIcon('heroicon-o-academic-cap')
                ->color('warning'),
            
            Stat::make('Member', User::where('role', 'member')->count())
                ->description('Pengguna member')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('success'),
        ];
    }

    protected function getColumns(): int
    {
        return 4;
    }
}
