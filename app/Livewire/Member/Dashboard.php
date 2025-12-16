<?php

namespace App\Livewire\Member;


use Carbon\Carbon;
use App\Models\Booking;
use App\Models\ClassSchedule;
use App\Models\WaitingList;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('member.layouts')]
class Dashboard extends Component
{
    // Widget Booking
    public $totalBookings = 0;
    public $bookingTerkonfirmasi = 0;
    public $bookingDibatalkan = 0;
    public $bookingSelesai = 0;
    
    // Widget Kelas
    public $totalKelas = 0;
    public $kelasTersedia = 0;
    public $kelasPenuh = 0;
    public $kelasSelesai = 0;
    
    // Widget Waiting List
    public $totalWaitingList = 0;
    public $daftarTungguAktif = 0;
    public $posisiTerbaik = 0;
    public $estimasiWaktu = 0;
    
    public $upcomingClass = null;
    
    // Notifikasi kelas besok
    public $tomorrowClasses = [];
    
    // Data untuk kalender
    public $calendarEvents = [];

    // Dipanggil saat komponen pertama kali dimuat
    public function mount()
    {
        Booking::updateCompletedBookings();
        $this->loadDashboardData();
    }

    // Fungsi untuk memuat data dari database
    public function loadDashboardData()
    {
        $userId = Auth::id();
        
        // Widget Booking User
        $this->totalBookings = Booking::where('user_id', $userId)->count();

        $this->bookingTerkonfirmasi = Booking::where('user_id', $userId)
            ->where('status', 'confirmed')
            ->count();

        $this->bookingDibatalkan = Booking::where('user_id', $userId)
            ->where('status', 'cancelled')
            ->count();

        $this->bookingSelesai = Booking::where('user_id', $userId)
            ->where('status', 'completed')
            ->count();
        
        // Widget Kelas (dari semua jadwal yang tersedia)
        $this->totalKelas = ClassSchedule::where('start_time', '>', now())->count();
        
        $this->kelasTersedia = ClassSchedule::where('start_time', '>', now())
            ->whereRaw('(SELECT COUNT(*) FROM bookings WHERE bookings.class_schedule_id = class_schedules.id AND bookings.status = "confirmed") < class_schedules.max_capacity')
            ->count();
            
        $this->kelasPenuh = ClassSchedule::where('start_time', '>', now())
            ->whereRaw('(SELECT COUNT(*) FROM bookings WHERE bookings.class_schedule_id = class_schedules.id AND bookings.status = "confirmed") >= class_schedules.max_capacity')
            ->count();
            
        $this->kelasSelesai = ClassSchedule::where('start_time', '<', now())->count();
        
        // Widget Waiting List User
        $this->totalWaitingList = WaitingList::where('user_id', $userId)->count();
        
        // Daftar tunggu aktif (jadwal belum dimulai)
        $this->daftarTungguAktif = WaitingList::where('user_id', $userId)
            ->whereHas('classSchedule', function($query) {
                $query->where('start_time', '>', now());
            })
            ->count();
        
        // Posisi terbaik (posisi terkecil)
        $bestPosition = WaitingList::where('user_id', $userId)
            ->whereHas('classSchedule', function($query) {
                $query->where('start_time', '>', now());
            })
            ->get()
            ->map(function($waiting) {
                return WaitingList::where('class_schedule_id', $waiting->class_schedule_id)
                    ->where('registered_at', '<', $waiting->registered_at)
                    ->count() + 1;
            })
            ->min();
        $this->posisiTerbaik = $bestPosition ?? 0;
        
        // Estimasi waktu (rata-rata hari sampai kelas dimulai)
        $avgDays = WaitingList::where('user_id', $userId)
            ->whereHas('classSchedule', function($query) {
                $query->where('start_time', '>', now());
            })
            ->with('classSchedule')
            ->get()
            ->avg(function($waiting) {
                return now()->diffInDays($waiting->classSchedule->start_time);
            });
        $this->estimasiWaktu = $avgDays ? round($avgDays) : 0;
        
        // Kelas Mendatang Terdekat
        $this->upcomingClass = Booking::where('user_id', $userId)
            ->where('status', 'confirmed')
            ->join('class_schedules', 'bookings.class_schedule_id', '=', 'class_schedules.id')
            ->where('class_schedules.start_time', '>', now())
            ->select('bookings.*')
            ->with(['classSchedule.classType', 'classSchedule.instructor'])
            ->orderBy('class_schedules.start_time', 'asc')
            ->first();
        
        // Notifikasi kelas besok (1 hari sebelum kelas dimulai)
        $tomorrow = now()->addDay()->startOfDay();
        $dayAfterTomorrow = now()->addDay()->endOfDay();
        
        $this->tomorrowClasses = Booking::where('user_id', $userId)
            ->where('status', 'confirmed')
            ->whereHas('classSchedule', function($query) use ($tomorrow, $dayAfterTomorrow) {
                $query->whereBetween('start_time', [$tomorrow, $dayAfterTomorrow]);
            })
            ->with(['classSchedule.class', 'classSchedule.instructorData'])
            ->get()
            ->map(function($booking) {
                return [
                    'class_name' => $booking->classSchedule->class->name ?? 'N/A',
                    'instructor' => $booking->classSchedule->instructorData->name ?? 'N/A',
                    'start_time' => $booking->classSchedule->start_time,
                    'location' => $booking->classSchedule->location ?? 'N/A',
                ];
            });
        
        // Data untuk kalender - Booking yang sudah dikonfirmasi
        $bookings = Booking::where('user_id', $userId)
            ->where('status', 'confirmed')
            ->with(['classSchedule.classType', 'classSchedule.instructorData'])
            ->get();
        
        $this->calendarEvents = $bookings->map(function($booking) {
            $schedule = $booking->classSchedule;
            $startTime = \Carbon\Carbon::parse($schedule->start_time);
            $endTime = \Carbon\Carbon::parse($schedule->end_time);
            
            // Tentukan warna berdasarkan status - sesuai tema Mazer
            if ($startTime->isPast()) {
                $bgColor = '#6c757d'; // Secondary - abu-abu untuk kelas selesai
                $borderColor = '#6c757d';
            } else {
                $bgColor = '#435ebe'; // Primary - biru Mazer untuk kelas mendatang
                $borderColor = '#435ebe';
            }
            
            // Ambil nama instructor dari tabel instructors jika ada
            $instructorName = 'N/A';
            if ($schedule->instructorData) {
                $instructorName = $schedule->instructorData->name;
            }
            
            return [
                'id' => $booking->id,
                'title' => $schedule->classType->name ?? 'Kelas',
                'start' => $startTime->format('Y-m-d H:i:s'),
                'end' => $endTime->format('Y-m-d H:i:s'),
                'backgroundColor' => $bgColor,
                'borderColor' => $borderColor,
                'textColor' => '#ffffff',
                'extendedProps' => [
                    'instructor' => $instructorName,
                    'location' => $schedule->location ?? 'N/A',
                    'status' => $startTime->isPast() ? 'Selesai' : 'Mendatang',
                ]
            ];
        })->values()->toArray();
    }

    public function render()
    {
        return view('livewire.member.dashboard');
    }
}