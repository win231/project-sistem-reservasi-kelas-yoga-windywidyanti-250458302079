<?php

namespace App\Filament\Instructor\Pages;

use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationLabel = 'Dashboard';

    public function getHeading(): string
    {
        return 'Dashboard'; 
    }
    
    public function getColumns(): int | array
    {
        return 12;
    }
}
