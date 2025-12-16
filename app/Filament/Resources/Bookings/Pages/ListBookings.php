<?php

namespace App\Filament\Resources\Bookings\Pages;

use App\Filament\Resources\Bookings\BookingResource;
use App\Filament\Resources\Bookings\Widgets\BookingStatsOverview;
use App\Models\Booking;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBookings extends ListRecords
{
    protected static string $resource = BookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->icon('heroicon-o-plus')
                ->label('Booking Baru'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            BookingStatsOverview::class,
        ];
    }
}
