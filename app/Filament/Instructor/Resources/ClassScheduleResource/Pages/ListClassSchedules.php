<?php

namespace App\Filament\Instructor\Resources\ClassScheduleResource\Pages;

use App\Filament\Instructor\Resources\ClassScheduleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListClassSchedules extends ListRecords
{
    protected static string $resource = ClassScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('export_excel')
                ->label('Export Excel')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('success')
                ->action(function () {
                    return $this->exportAllSchedules();
                }),
        ];
    }
    
    protected function exportAllSchedules()
    {
        $schedules = ClassScheduleResource::getEloquentQuery()->get();
        
        $fileName = 'jadwal_kelas_' . Auth::user()->name . '_' . now()->format('Y-m-d') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];
        
        $callback = function() use ($schedules) {
            $file = fopen('php://output', 'w');
            
            // Header
            fputcsv($file, ['DAFTAR JADWAL KELAS']);
            fputcsv($file, ['Instruktur', Auth::user()->name]);
            fputcsv($file, ['Tanggal Export', now()->format('d M Y, H:i')]);
            fputcsv($file, []);
            
            // Header tabel
            fputcsv($file, ['No', 'Kelas', 'Tipe', 'Lokasi', 'Waktu Mulai', 'Waktu Selesai', 'Peserta', 'Kapasitas', 'Status']);
            
            // Data
            foreach ($schedules as $index => $schedule) {
                $bookingCount = $schedule->bookings->count();
                $status = $schedule->start_time > now() ? 'Mendatang' : 'Selesai';
                
                fputcsv($file, [
                    $index + 1,
                    $schedule->class->name,
                    $schedule->class->type->name,
                    $schedule->location,
                    $schedule->start_time->format('d M Y, H:i'),
                    $schedule->end_time->format('H:i'),
                    $bookingCount,
                    $schedule->max_capacity,
                    $status
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
}