<?php

namespace App\Filament\Pages;

class Dashboard extends \Filament\Pages\Dashboard
{
    protected static ?string $navigationLabel = 'Dashboard';

    public function getHeading(): string
    {
        return 'Dashboard';
    }
    
    public function getColumns(): int
    {
        return 12;
    }
}
