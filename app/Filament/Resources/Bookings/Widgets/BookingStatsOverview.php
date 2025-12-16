<?php

namespace App\Filament\Resources\Bookings\Widgets;

use App\Models\Booking;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BookingStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Booking', Booking::count())
                ->description('Semua booking')
                ->descriptionIcon('heroicon-o-rectangle-stack')
                ->color('info'),
            
            Stat::make('Booking Dikonfirmasi', Booking::where('status', 'confirmed')->count())
                ->description('Booking diterima')
                ->descriptionIcon('heroicon-o-check-circle')
                ->color('success'),
            
            Stat::make('Booking Dibatalkan', Booking::where('status', 'cancelled')->count())
                ->description('Booking dibatalkan')
                ->descriptionIcon('heroicon-o-x-circle')
                ->color('danger'),
            
            Stat::make('Booking Selesai', Booking::where('status', 'completed')->count())
                ->description('Booking selesai')
                ->descriptionIcon('heroicon-o-check-badge')
                ->color('warning'),
        ];
    }

    protected function getColumns(): int
    {
        return 4;
    }
}
