<?php

namespace App\Filament\Widgets;

use Filament\Widgets\FilamentInfoWidget as BaseFilamentInfoWidget;

class FilamentInfoWidget extends BaseFilamentInfoWidget
{
    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = 6;
    
    // Widget ini tidak ditampilkan
    protected static bool $isDiscovered = false;
}
