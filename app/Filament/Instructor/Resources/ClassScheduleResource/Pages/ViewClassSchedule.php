<?php

namespace App\Filament\Instructor\Resources\ClassScheduleResource\Pages;

use App\Filament\Instructor\Resources\ClassScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewClassSchedule extends ViewRecord
{
    protected static string $resource = ClassScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('export_detail')
                ->label('Export Detail CSV')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->url(fn (): string => route('instructor.schedule.export', ['schedule' => $this->record]))
                ->openUrlInNewTab(),
        ];
    }
    
    protected function getViewData(): array
    {
        return [
            'participants' => $this->record->bookings()
                ->with('user')
                ->get(),
        ];
    }
    
    public function getView(): string
    {
        return 'filament.resources.class-schedule.view';
    }
}