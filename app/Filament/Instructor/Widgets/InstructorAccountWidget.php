<?php

namespace App\Filament\Instructor\Widgets;

use Filament\Widgets\AccountWidget as BaseAccountWidget;

class InstructorAccountWidget extends BaseAccountWidget
{
    protected static ?int $sort = 1;
    protected int|string|array $columnSpan = 'full';
}
