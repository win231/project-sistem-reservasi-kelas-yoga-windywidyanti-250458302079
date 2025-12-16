<div>
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 mb-4">
                    <h3>Daftar Kelas</h3>
                    <p class="text-subtitle text-muted">Jelajahi berbagai kelas yoga yang tersedia</p>
                </div>

                {{-- Widget Statistik Jadwal Kelas --}}
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldCategory"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Kelas</h6>
                                    <h6 class="font-extrabold mb-0">{{ $totalKelas }}</h6>
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

                {{-- Widget Statistik Per Level --}}
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldStar"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Kelas Pemula</h6>
                                    <h6 class="font-extrabold mb-0">{{ $kelasBeginner }}</h6>
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
                                        <i class="iconly-boldChart"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Kelas Menengah</h6>
                                    <h6 class="font-extrabold mb-0">{{ $kelasIntermediate }}</h6>
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
                                        <i class="iconly-boldShield-Done"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Kelas Lanjutan</h6>
                                    <h6 class="font-extrabold mb-0">{{ $kelasAdvanced }}</h6>
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
                                        <i class="iconly-boldTicket-Star"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Kelas Semua Level</h6>
                                    <h6 class="font-extrabold mb-0">{{ $kelasAllLevels }}</h6>
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
                                    <label class="form-label">Cari Kelas</label>
                                    <input type="text" class="form-control" wire:model.live="search" placeholder="Cari nama kelas atau deskripsi...">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Filter Tingkat Kesulitan</label>
                                    <select class="form-select" wire:model.live="difficultyFilter">
                                        <option value="">Semua Tingkat</option>
                                        <option value="beginner">Pemula</option>
                                        <option value="intermediate">Menengah</option>
                                        <option value="advanced">Lanjutan</option>
                                        <option value="all_levels">Semua Level</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Daftar Kelas --}}
                @forelse ($kelas as $item)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0">{{ $item->name }}</h5>
                                <span class="badge bg-primary">{{ $item->type->name ?? 'N/A' }}</span>
                            </div>
                            
                            <div class="mb-3">
                                <span class="badge bg-light-info">
                                    <i class="bi bi-bar-chart"></i> {{ $this->getDifficultyLabel($item->difficulty_level) }}
                                </span>
                            </div>

                            <p class="card-text text-muted small">
                                {{ Str::limit($item->description, 500) }}
                            </p>

                            <hr>

                            <div class="mb-3">
                                <h6 class="text-muted mb-2">
                                    <i class="bi bi-calendar3"></i> Jadwal Tersedia ({{ $item->schedules->count() }})
                                </h6>
                                @if ($item->schedules->count() > 0)
                                    <div class="small">
                                        @foreach ($item->schedules->take(3) as $schedule)
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <span>{{ $schedule->start_time->format('d M Y, H:i') }}</span>
                                            @php
                                                $bookedCount = $schedule->bookings()->where('status', 'confirmed')->count();
                                                $isFull = $bookedCount >= $schedule->max_capacity;
                                            @endphp
                                            <span class="badge bg-light-{{ $isFull ? 'danger' : 'success' }}">
                                                {{ $bookedCount }}/{{ $schedule->max_capacity }}
                                            </span>
                                        </div>
                                        @endforeach
                                        @if ($item->schedules->count() > 3)
                                        <small class="text-muted">+{{ $item->schedules->count() - 3 }} jadwal lainnya</small>
                                        @endif
                                    </div>
                                @else
                                    <small class="text-muted">Belum ada jadwal</small>
                                @endif
                            </div>

                            <a href="{{ route('member.jadwal') }}" class="btn btn-primary btn-block w-100">
                                <i class="bi bi-calendar-check"></i> Lihat Jadwal & Booking
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                            <p class="mt-3 text-muted">Tidak ada kelas yang ditemukan</p>
                        </div>
                    </div>
                </div>
                @endforelse

                {{-- Pagination --}}
                @if ($kelas->hasPages())
                <div class="col-12 mt-4">
                    <div class="d-flex justify-content-center">
                        {{ $kelas->links() }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
</div>
