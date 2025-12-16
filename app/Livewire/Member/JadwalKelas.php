<?php

namespace App\Livewire\Member;

use App\Models\Booking;
use App\Models\ClassSchedule;
use App\Models\Classes;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('member.layouts')]
class JadwalKelas extends Component
{
    use WithPagination;

    public $search = '';
    public $classFilter = '';
    public $locationFilter = '';

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingClassFilter()
    {
        $this->resetPage();
    }

    public function updatingLocationFilter()
    {
        $this->resetPage();
    }

    public function booking($scheduleId)
    {
        // Pastikan user sudah login
        if (!auth()->check()) {
            session()->flash('error', 'Silakan login terlebih dahulu.');
            return redirect()->route('login');
        }

        $schedule = ClassSchedule::find($scheduleId);
        
        if (!$schedule) {
            session()->flash('error', 'Jadwal tidak ditemukan.');
            return;
        }

        // Cek apakah sudah booking
        $existingBooking = Booking::where('user_id', auth()->id())
            ->where('class_schedule_id', $scheduleId)
            ->whereIn('status', ['pending', 'confirmed'])
            ->first();

        if ($existingBooking) {
            session()->flash('error', 'Anda sudah melakukan booking untuk jadwal ini.');
            return;
        }

        // Cek apakah sudah di waiting list
        $existingWaitingList = \App\Models\WaitingList::where('user_id', auth()->id())
            ->where('class_schedule_id', $scheduleId)
            ->first();

        if ($existingWaitingList) {
            session()->flash('error', 'Anda sudah terdaftar di daftar tunggu untuk jadwal ini.');
            return;
        }

        // Cek kapasitas
        $bookedCount = $schedule->bookings()->where('status', 'confirmed')->count();
        
        if ($bookedCount >= $schedule->max_capacity) {
            // Kelas penuh, masukkan ke waiting list
            \App\Models\WaitingList::create([
                'user_id' => auth()->id(),
                'class_schedule_id' => $scheduleId,
                'registered_at' => now(),
            ]);

            session()->flash('success', 'Kelas penuh! Anda telah ditambahkan ke daftar tunggu.');
            return redirect()->route('member.jadwal');
        }

        // Buat booking langsung jika masih ada slot
        Booking::create([
            'user_id' => auth()->id(),
            'class_schedule_id' => $scheduleId,
            'status' => 'confirmed',
        ]);

        session()->flash('success', 'Booking berhasil! Lihat di menu Booking.');
        
        // Refresh halaman
        return redirect()->route('member.jadwal');
    }

    public function cancelBooking($bookingId)
    {
        $booking = Booking::where('id', $bookingId)
            ->where('user_id', auth()->id())
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
            Booking::create([
                'user_id' => $firstWaiting->user_id,
                'class_schedule_id' => $scheduleId,
                'status' => 'confirmed',
            ]);

            // Hapus dari waiting list
            $firstWaiting->delete();

            // Bisa tambahkan notifikasi ke user yang dipindahkan
        }

        session()->flash('success', 'Booking berhasil dibatalkan.');
        return redirect()->route('member.booking');
    }

    public function render()
    {
        $schedules = ClassSchedule::with(['class', 'instructor.instructor'])
            ->where('start_time', '>', now())
            ->when($this->search, function($query) {
                $query->whereHas('class', function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->classFilter, function($query) {
                $query->where('class_id', $this->classFilter);
            })
            ->when($this->locationFilter, function($query) {
                $query->where('location', $this->locationFilter);
            })
            ->orderBy('start_time', 'asc')
            ->paginate(10);

        $classes = Classes::all();
        $locations = ClassSchedule::distinct()->pluck('location');

        return view('livewire.member.jadwal-kelas', [
            'schedules' => $schedules,
            'classes' => $classes,
            'locations' => $locations,
        ]);
    }
}
