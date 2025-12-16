<div>
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 mb-4">
                    <h3>Jadwal Kelas</h3>
                    <p class="text-subtitle text-muted">Pilih jadwal kelas dan lakukan booking</p>
                </div>

                {{-- Alert Messages --}}
                @if (session()->has('success'))
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                @if (session()->has('error'))
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                {{-- Filter Section --}}
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">Cari Kelas</label>
                                    <input type="text" wire:model.live="search" class="form-control" placeholder="Cari nama kelas...">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Filter Kelas</label>
                                    <select wire:model.live="classFilter" class="form-select">
                                        <option value="">Semua Kelas</option>
                                        @foreach($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Filter Lokasi</label>
                                    <select wire:model.live="locationFilter" class="form-select">
                                        <option value="">Semua Ruangan</option>
                                        @foreach($locations as $location)
                                            <option value="{{ $location }}">{{ $location }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Jadwal List --}}
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if($schedules->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Kelas</th>
                                                <th>Instruktur</th>
                                                <th>Waktu</th>
                                                <th>Lokasi</th>
                                                <th>Kapasitas</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($schedules as $schedule)
                                                @php
                                                    $bookedCount = $schedule->bookings()->where('status', 'confirmed')->count();
                                                    $isFull = $bookedCount >= $schedule->max_capacity;
                                                    $isBooked = $schedule->bookings()->where('user_id', auth()->id())->whereIn('status', ['pending', 'confirmed'])->exists();
                                                    $isInWaitingList = \App\Models\WaitingList::where('user_id', auth()->id())->where('class_schedule_id', $schedule->id)->exists();
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <strong>{{ $schedule->class->name }}</strong>
                                                        <br>
                                                        <small class="text-muted">{{ $schedule->class->type->name }}</small>
                                                    </td>
                                                    <td>
                                                        @if($schedule->instructor && $schedule->instructor->instructor)
                                                            {{ $schedule->instructor->instructor->name }}
                                                        @else
                                                            <span class="text-muted">-</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <i class="bi bi-calendar3"></i> {{ $schedule->start_time->format('d M Y') }}
                                                        <br>
                                                        <i class="bi bi-clock"></i> {{ $schedule->start_time->format('H:i') }} - {{ $schedule->end_time->format('H:i') }}
                                                    </td>
                                                    <td>{{ $schedule->location }}</td>
                                                    <td>
                                                        <span class="badge bg-light-{{ $isFull ? 'danger' : 'success' }}">
                                                            {{ $bookedCount }}/{{ $schedule->max_capacity }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if($isBooked)
                                                            <button class="btn btn-sm btn-secondary" disabled>
                                                                <i class="bi bi-check-circle"></i> Sudah Booking
                                                            </button>
                                                        @elseif($isInWaitingList)
                                                            <button class="btn btn-sm btn-warning" disabled>
                                                                <i class="bi bi-hourglass-split"></i> Daftar Tunggu
                                                            </button>
                                                        @else
                                                            <button wire:click="booking({{ $schedule->id }})" 
                                                                    class="btn btn-sm {{ $isFull ? 'btn-warning' : 'btn-primary' }}"
                                                                    wire:loading.attr="disabled"
                                                                    wire:target="booking({{ $schedule->id }})">
                                                                <span wire:loading.remove wire:target="booking({{ $schedule->id }})">
                                                                    @if($isFull)
                                                                        <i class="bi bi-hourglass-split"></i> Daftar Tunggu
                                                                    @else
                                                                        <i class="bi bi-calendar-plus"></i> Booking
                                                                    @endif
                                                                </span>
                                                                <span wire:loading wire:target="booking({{ $schedule->id }})">
                                                                    <span class="spinner-border spinner-border-sm" role="status"></span>
                                                                    Memproses...
                                                                </span>
                                                            </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-3">
                                    {{ $schedules->links() }}
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="bi bi-calendar-x" style="font-size: 3rem; opacity: 0.3;"></i>
                                    <p class="text-muted mt-3">Tidak ada jadwal yang tersedia</p>
                                    <a href="{{ route('member.kelas') }}" class="btn btn-primary mt-2">
                                        <i class="bi bi-arrow-left"></i> Kembali ke Daftar Kelas
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
