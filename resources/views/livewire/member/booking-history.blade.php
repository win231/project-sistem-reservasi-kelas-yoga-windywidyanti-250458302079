<div> 
    @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @php
    $cancellableStatuses = ['confirmed'];

    $bookingsUpcoming = $bookings->filter(fn($b) => $b->classSchedule->start_time->isFuture() && in_array($b->status, $cancellableStatuses));
    $bookingsHistory = $bookings->filter(fn($b) => $b->classSchedule->start_time->isPast() || !in_array($b->status, $cancellableStatuses));
    @endphp

    {{-- Bagian Akan Datang --}}
    <h4 class="mb-3">Akan Datang</h4>
    @if ($bookingsUpcoming->isEmpty())
    <div class="alert alert-info">Tidak ada booking kelas yang akan datang.</div>
    @else
    <div class="row g-3">
        @foreach ($bookingsUpcoming as $booking)
        @php
        $schedule = $booking->classSchedule;
        $limitWaktu = $schedule->start_time->copy()->subDay();
        $canCancel = in_array($booking->status, $cancellableStatuses) && $limitWaktu->isFuture();
        @endphp
        <div class="col-md-6">
            <div class="card shadow-sm rounded p-3 border border-primary">
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                    <h5 class="mb-0 fw-semibold">{{ $schedule->classType->name ?? 'Kelas Dihapus' }}</h5>
                    <div class="d-flex gap-2 align-items-center flex-nowrap">
                        <span class="badge bg-info text-white px-2 py-1">Diterima</span>
                        <span class="badge bg-primary text-white px-2 py-1">Akan Datang</span>
                    </div>
                </div>
                <p class="text-muted mb-1">Instruktur: {{ $schedule->instructor->name ?? 'N/A' }}</p>
                <p class="mb-3"><strong>Waktu:</strong> {{ $schedule->start_time->translatedFormat('l, d F Y') }} pukul {{ $schedule->start_time->format('H:i') }}</p>

                <div class="d-flex justify-content-end">
                    @if ($canCancel)
                    <button
                        wire:click="cancelBooking({{ $booking->id }})"
                        wire:confirm="Anda yakin ingin membatalkan booking ini?"
                        class="btn btn-danger btn-sm">
                        Batalkan Booking
                    </button>
                    @else
                    <small class="text-danger">Batas pembatalan (H-1 sebelum kelas) sudah lewat.</small>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

    {{-- Bagian Selesai / Dibatalkan --}}
    <h4 class="mt-5 mb-3">Selesai / Dibatalkan</h4>
    @if ($bookingsHistory->isEmpty())
    <div class="alert alert-info">Tidak ada riwayat booking kelas.</div>
    @else
    <div class="row g-3">
        @foreach ($bookingsHistory as $booking)
        @php
        $schedule = $booking->classSchedule;
        if ($booking->status === 'cancelled' || $booking->status === 'cencelled') {
        $statusBadge = '<span class="badge bg-warning text-dark px-2 py-1">Dibatalkan</span>';
        $cardClass = 'border-warning opacity-75';
        } else {
        $statusBadge = '<span class="badge bg-success text-white px-2 py-1">Selesai</span>';
        $cardClass = 'border-success';
        }
        @endphp
        <div class="col-md-6">
            <div class="card shadow-sm rounded p-3 border {{ $cardClass }}">
                <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                    <h5 class="mb-0 fw-semibold">{{ $schedule->classType->name ?? 'Kelas Dihapus' }}</h5>
                    <div>{!! $statusBadge !!}</div>
                </div>
                <p class="text-muted mb-1">Instruktur: {{ $schedule->instructor->name ?? 'N/A' }}</p>
                <p><strong>Waktu:</strong> {{ $schedule->start_time->translatedFormat('l, d F Y') }} pukul {{ $schedule->start_time->format('H:i') }}</p>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>