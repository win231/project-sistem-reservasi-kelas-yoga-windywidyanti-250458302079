<?php

namespace App\Livewire\Member;

use App\Models\Booking;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class BookingHistory extends Component
{
    public $bookings;

    public function mount()
    {
        Booking::updateCompletedBookings();
        $this->loadBookings();
    }

    public function loadBookings()
    {
        $userId = Auth::id();

        $this->bookings = Booking::where('user_id', $userId)
            ->join('class_schedules', 'bookings.class_schedule_id', '=', 'class_schedules.id')
            ->select('bookings.*')
            ->with(['classSchedule.classType', 'classSchedule.instructor'])
            ->orderBy('bookings.status', 'asc')
            ->orderBy('class_schedules.start_time', 'asc') // Saran: Pakai ASC biar yang terdekat muncul duluan
            ->get();
    }

    public function cancelBooking($bookingId)
    {
        $booking = Booking::with('classSchedule')->find($bookingId);

        // Pastikan status 'confirmed' masuk sini
        $cancellableStatuses = ['confirmed'];

        // Validasi dasar
        if (!$booking || $booking->user_id !== Auth::id() || !in_array($booking->status, $cancellableStatuses)) {
            session()->flash('error', 'Booking tidak valid atau sudah dibatalkan/selesai.');
            $this->loadBookings();
            return;
        }

        // --- 🔥 PERBAIKAN LOGIKA WAKTU DI SINI 🔥 ---
        $scheduleTime = $booking->classSchedule->start_time;

        // Tentukan batas waktu (1 jam sebelum kelas)
        $batasWaktu = $scheduleTime->copy()->subDay();

        // Logika manusia: Jika "Sekarang" sudah melewati "Batas Waktu", maka tolak.
        if (now()->greaterThan($batasWaktu)) {
            session()->flash('error', 'Pembatalan tidak diizinkan. Batas waktu (1 hari sebelum kelas) sudah terlewat.');
            return;
        }
        // ---------------------------------------------

        try {
            $booking->status = 'cancelled';
            $booking->save();

            session()->flash('success', 'Booking berhasil dibatalkan.');
            $this->loadBookings();
        } catch (\Exception $e) {
            // Tampilkan pesan error asli dari sistem/database
            session()->flash('error', 'Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.member.booking-history');
    }
}
