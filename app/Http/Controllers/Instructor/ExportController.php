<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\ClassSchedule;
use Illuminate\Support\Facades\Auth;

class ExportController extends Controller
{
    public function exportScheduleDetail(ClassSchedule $schedule)
    {
        // Pastikan schedule milik instructor yang login
        if ($schedule->instructor_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
        
        $fileName = 'jadwal_' . str_replace(' ', '_', $schedule->class->name) . '_' . $schedule->start_time->format('Y-m-d') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];
        
        $callback = function() use ($schedule) {
            $file = fopen('php://output', 'w');
            
            // Header informasi jadwal
            fputcsv($file, ['DETAIL JADWAL KELAS']);
            fputcsv($file, ['Kelas', $schedule->class->name]);
            fputcsv($file, ['Tipe', $schedule->class->type->name]);
            fputcsv($file, ['Instruktur', $schedule->instructor->name]);
            fputcsv($file, ['Lokasi', $schedule->location]);
            fputcsv($file, ['Waktu Mulai', $schedule->start_time->format('d M Y, H:i')]);
            fputcsv($file, ['Waktu Selesai', $schedule->end_time->format('d M Y, H:i')]);
            fputcsv($file, ['Kapasitas', $schedule->bookings->count() . '/' . $schedule->max_capacity]);
            fputcsv($file, []);
            
            // Header tabel booking
            fputcsv($file, ['DAFTAR PESERTA']);
            fputcsv($file, ['No', 'Nama', 'Email', 'Status', 'Tanggal Booking']);
            
            // Data booking
            foreach ($schedule->bookings as $index => $booking) {
                fputcsv($file, [
                    $index + 1,
                    $booking->user->name,
                    $booking->user->email,
                    $booking->status,
                    $booking->created_at->format('d M Y, H:i')
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
}
