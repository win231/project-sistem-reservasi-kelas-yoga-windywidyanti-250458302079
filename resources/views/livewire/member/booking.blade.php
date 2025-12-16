<div>
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 mb-4">
                    <h3>Booking Saya</h3>
                    <p class="text-subtitle text-muted">Kelola riwayat booking kelas yoga Anda</p>
                </div>

                {{-- Widget Statistik Status Booking --}}
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Booking</h6>
                                    <h6 class="font-extrabold mb-0">{{ $totalBooking }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldTime-Circle"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Dikonfirmasi</h6>
                                    <h6 class="font-extrabold mb-0">{{ $bookingKonfirmasi }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldTick-Square"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Dibatalkan</h6>
                                    <h6 class="font-extrabold mb-0">{{ $bookingDibatalkan }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldClose-Square"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Selesai</h6>
                                    <h6 class="font-extrabold mb-0">{{ $bookingSelesai }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Widget Statistik Tambahan --}}
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldTicket-Star"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Kelas Diikuti</h6>
                                    <h6 class="font-extrabold mb-0">{{ $totalKelasDigikuti }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon blue mb-2">
                                        <i class="iconly-boldTicket"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Kelas Tersedia</h6>
                                    <h6 class="font-extrabold mb-0">{{ $kelasTersedia }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldDanger"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Kelas Penuh</h6>
                                    <h6 class="font-extrabold mb-0">{{ $kelasPenuh }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldTime-Circle"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Kelas Selesai</h6>
                                    <h6 class="font-extrabold mb-0">{{ $kelasSelesai }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Filter dan Search --}}
                <div class="col-12 mb-4 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Cari Booking</label>
                                    <input type="text" class="form-control" wire:model.live="search" placeholder="Cari nama kelas, instruktur...">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Filter Status</label>
                                    <select class="form-select" wire:model.live="statusFilter">
                                        <option value="">Semua Status</option>
                                        <option value="confirmed">Dikonfirmasi</option>
                                        <option value="rejected">Ditbatalkan</option>
                                        <option value="cancelled">Selesai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Daftar Booking --}}
                @forelse ($bookings as $booking)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0">{{ $booking->classSchedule->class->name ?? 'N/A' }}</h5>
                                <span class="badge {{ $this->getStatusBadge($booking->status) }}">
                                    {{ $this->getStatusLabel($booking->status) }}
                                </span>
                            </div>

                            <div class="mb-3">
                                <span class="badge bg-light-primary">
                                    <i class="bi bi-tag"></i> {{ $booking->classSchedule->class->type->name ?? 'N/A' }}
                                </span>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">
                                    <i class="bi bi-person"></i> Instruktur: <strong>{{ $booking->classSchedule->instructor->instructor->name ?? 'N/A' }}</strong>
                                </small>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">
                                    <i class="bi bi-calendar3"></i> {{ $booking->classSchedule->start_time->format('d M Y, H:i') ?? 'N/A' }}
                                </small>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">
                                    <i class="bi bi-clock"></i> {{ $booking->classSchedule->start_time->format('H:i') }} - {{ $booking->classSchedule->end_time->format('H:i') }}
                                </small>
                            </div>

                            <div class="mb-3">
                                <small class="text-muted">
                                    <i class="bi bi-geo-alt"></i> {{ $booking->classSchedule->location ?? 'N/A' }}
                                </small>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    Booking: {{ $booking->created_at->format('d M Y') }}
                                </small>

                                @if($booking->status == 'completed')
                                    @if($booking->review)
                                    <a href="{{ route('member.ulasan') }}" class="btn btn-sm btn-secondary">
                                        <i class="bi bi-star-fill"></i> Lihat Review
                                    </a>
                                    @else
                                    <a href="{{ route('member.ulasan', ['booking' => $booking->id]) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-star"></i> Beri Review
                                    </a>
                                    @endif
                                @elseif($booking->status == 'confirmed')
                                    <button wire:click="cancelBooking({{ $booking->id }})"
                                            class="btn btn-sm btn-danger"
                                            wire:loading.attr="disabled"
                                            wire:target="cancelBooking({{ $booking->id }})"
                                            onclick="return confirm('Yakin ingin membatalkan booking ini?')">
                                        <span wire:loading.remove wire:target="cancelBooking({{ $booking->id }})">
                                            <i class="bi bi-x-circle"></i> Batalkan
                                        </span>
                                        <span wire:loading wire:target="cancelBooking({{ $booking->id }})">
                                            <span class="spinner-border spinner-border-sm"></span> Proses...
                                        </span>
                                    </button>
                                @elseif($booking->status == 'cancelled')
                                <span class="badge bg-secondary">Dibatalkan</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                            <p class="mt-3 text-muted">Tidak ada booking yang ditemukan</p>
                            <a href="{{ route('member.kelas') }}" class="btn btn-primary mt-2">
                                <i class="bi bi-plus-circle"></i> Booking Kelas Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                @endforelse

                {{-- Pagination --}}
                @if ($bookings->hasPages())
                <div class="col-12 mt-4">
                    <div class="d-flex justify-content-center">
                        {{ $bookings->links() }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
</div>