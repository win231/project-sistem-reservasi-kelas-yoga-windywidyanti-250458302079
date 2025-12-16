<?php

namespace App\Livewire\Member;

use App\Models\Booking as BookingModel;
use App\Models\ClassSchedule;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

#[Layout('member.layouts')]
class Booking extends Component
{
    use WithPagination;

    protected $listeners = [
        'bookingUpdated' => 'loadStatistics',
    ];

    public $search = '';
    public $statusFilter = '';

    // Widget statistik
    public $totalBooking = 0;
    public $bookingPending = 0;
    public $bookingKonfirmasi = 0;
    public $bookingDibatalkan = 0;
    public $bookingSelesai = 0;
    
    // Statistik tambahan
    public $totalKelasDigikuti = 0;
    public $kelasTersedia = 0;
    public $kelasPenuh = 0;
    public $kelasSelesai = 0;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->loadStatistics();
    }

    public function loadStatistics()
    {
        $userId = Auth::id();
        
        // Statistik Status Booking
        $this->totalBooking = BookingModel::where('user_id', $userId)->count();

        $this->bookingKonfirmasi = BookingModel::where('user_id', $userId)
            ->where('status', 'confirmed')
            ->count();
            
        $this->bookingDibatalkan = BookingModel::where('user_id', $userId)
            ->where('status', 'cancelled')
            ->count();

        $this->bookingSelesai = BookingModel::where('user_id', $userId)
            ->where('status', 'completed')
            ->count();
        
        // Statistik Tambahan
        // Total kelas yang diikuti (booking confirmed)
        $this->totalKelasDigikuti = BookingModel::where('user_id', $userId)
            ->where('status', 'confirmed')
            ->count();
        
        // Kelas tersedia (dari semua jadwal yang belum penuh dan belum dimulai)
        $this->kelasTersedia = ClassSchedule::where('start_time', '>', now())
            ->whereRaw('(SELECT COUNT(*) FROM bookings WHERE bookings.class_schedule_id = class_schedules.id AND bookings.status = "confirmed") < class_schedules.max_capacity')
            ->count();
            
        // Kelas penuh (dari semua jadwal yang sudah penuh)
        $this->kelasPenuh = ClassSchedule::where('start_time', '>', now())
            ->whereRaw('(SELECT COUNT(*) FROM bookings WHERE bookings.class_schedule_id = class_schedules.id AND bookings.status = "confirmed") >= class_schedules.max_capacity')
            ->count();
            
        // Kelas selesai (jadwal yang sudah lewat)
        $this->kelasSelesai = ClassSchedule::where('start_time', '<', now())->count();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function cancelBooking($bookingId)
    {
        $booking = BookingModel::where('id', $bookingId)
            ->where('user_id', Auth::id())
            ->first();

        if (!$booking) {
            session()->flash('error', 'Booking tidak ditemukan.');
            return;
        }

        $scheduleId = $booking->class_schedule_id;

        // Ubah status menjadi cancelled (tidak dihapus)
        $booking->status = 'cancelled';
        $booking->save();

        // Cek apakah ada yang di waiting list
        $firstWaiting = \App\Models\WaitingList::where('class_schedule_id', $scheduleId)
            ->orderBy('registered_at', 'asc')
            ->first();

        if ($firstWaiting) {
            // Pindahkan dari waiting list ke booking
            BookingModel::create([
                'user_id' => $firstWaiting->user_id,
                'class_schedule_id' => $scheduleId,
                'status' => 'confirmed',
            ]);

            // Hapus dari waiting list
            $firstWaiting->delete();
        }

        session()->flash('success', 'Booking berhasil dibatalkan.');
        $this->loadStatistics();
    }

    public function getStatusLabel($status)
    {
        return match($status) {
            'confirmed' => 'Dikonfirmasi',
            'cancelled' => 'Dibatalkan',
            'completed' => 'Selesai',
            default => $status
        };
    }

    public function getStatusBadge($status)
    {
        return match($status) {
            'confirmed' => 'bg-success',
            'cancelled' => 'bg-secondary',
            'completed' => 'bg-primary',
            default => 'bg-light'
        };
    }

    public function redirectToReview($bookingId)
    {
        return redirect()->route('member.ulasan', ['booking' => $bookingId]);
    }

    public function render()
    {
        $bookings = BookingModel::with(['classSchedule.class.type', 'classSchedule.instructor', 'review'])
            ->where('user_id', Auth::id())
            ->when($this->search, function($query) {
                $query->whereHas('classSchedule.class', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('classSchedule.instructor', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->statusFilter, function($query) {
                $query->where('status', $this->statusFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('livewire.member.booking', [
            'bookings' => $bookings,
        ]);
    }
}
