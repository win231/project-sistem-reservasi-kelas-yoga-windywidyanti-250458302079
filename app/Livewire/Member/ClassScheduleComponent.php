<?php

namespace App\Livewire\Member;

use Livewire\Component;
use App\Models\ClassSchedule;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class ClassScheduleComponent extends Component
{
    // Properti untuk menyimpan daftar jadwal
    public $schedules;

    // Properti untuk menampilkan pesan status
    public $statusMessage = '';

    public function mount()
    {
        $this->loadSchedules();
    }

    public function loadSchedules()
    {
        $this->schedules = ClassSchedule::where('start_time', '>', now())
            ->with(['instructor', 'classType', 'bookings'])
            ->orderBy('start_time')
            ->get();
        return $this->schedules;  // Tambahkan return agar bisa assign di bookClass()
    }

    /**
     * Fungsi untuk melakukan booking kelas.
     */
    public function bookClass($scheduleId)
    {
        // 1. Ambil Jadwal Kelas
        $schedule = \App\Models\ClassSchedule::with('bookings')->find($scheduleId);

        if (!$schedule || $schedule->start_time->isPast()) {
            session()->flash('error', 'Jadwal kelas tidak valid atau sudah berakhir.');
            return;
        }

        // 1. Hitung slot terpakai (Abaikan cancelled)
        $bookedSlots = $schedule->bookings->where('status', '!=', 'cancelled')->count();

        // 2. Bandingkan dengan max_capacity (bukan capacity)
        if ($bookedSlots >= $schedule->max_capacity) {
            session()->flash('error', 'Maaf, kuota kelas sudah penuh.');
            return;
        }

        // 3. Cek apakah user sudah punya booking AKTIF di kelas ini
        $isBooked = $schedule->bookings->where('user_id', Auth::id())
            ->where('status', '!=', 'cancelled')
            ->isNotEmpty();

        if ($isBooked) {
            session()->flash('error', 'Anda sudah booking kelas ini (Status Aktif).');
            return;
        }
        try {
            // Buat Booking Baru
            \App\Models\Booking::create([ // Gunakan namespace penuh jika tidak di-use di atas
                'user_id' => Auth::id(),
                'class_schedule_id' => $scheduleId,
                'status' => 'confirmed',
            ]);

            session()->flash('success', 'Booking berhasil! Slot Anda langsung dikonfirmasi.');

            // Muat ulang data untuk update kuota dan status tombol
            $this->schedules = $this->loadSchedules();
            
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal memproses booking.');
        }
    }
    

    public function render()
    {
        return view('livewire.member.class-schedule-component');
    }
}
