<div>
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 mb-4">
                    <h3>Ulasan Saya</h3>
                    <p class="text-subtitle text-muted">Kelola ulasan dan rating kelas yoga Anda</p>
                </div>

                {{-- Alert Messages --}}
                @if (session()->has('message'))
                <div class="col-12">
                    <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif

                {{-- Widget Statistik Ulasan --}}
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
                                    <h6 class="text-muted font-semibold">Total Ulasan</h6>
                                    <h6 class="font-extrabold mb-0">{{ $totalUlasan }}</h6>
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
                                    <h6 class="text-muted font-semibold">Rata-rata Rating</h6>
                                    <h6 class="font-extrabold mb-0">{{ $rataRataRating }} ⭐</h6>
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
                                        <i class="iconly-boldHeart"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Ulasan Bintang 5</h6>
                                    <h6 class="font-extrabold mb-0">{{ $ulasanBintang5 }}</h6>
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
                                        <i class="iconly-boldCalendar"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Ulasan Bulan Ini</h6>
                                    <h6 class="font-extrabold mb-0">{{ $ulasanBulanIni }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Widget Rating Distribution --}}
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
                                    <h6 class="text-muted font-semibold">Bintang 4</h6>
                                    <h6 class="font-extrabold mb-0">{{ $ulasanBintang4 }}</h6>
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
                                        <i class="iconly-boldShield-Done"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Bintang 3</h6>
                                    <h6 class="font-extrabold mb-0">{{ $ulasanBintang3 }}</h6>
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
                                        <i class="iconly-boldMessage"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Bintang 2</h6>
                                    <h6 class="font-extrabold mb-0">{{ $ulasanBintang2 }}</h6>
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
                                        <i class="iconly-boldInfo-Circle"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Bintang 1</h6>
                                    <h6 class="font-extrabold mb-0">{{ $ulasanBintang1 }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kelas yang bisa direview --}}
                @if($reviewableBookings->count() > 0)
                <div class="col-12 mt-3 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Kelas yang Belum Diulas</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Kelas</th>
                                            <th>Instruktur</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reviewableBookings as $booking)
                                        <tr>
                                            <td>{{ $booking->classSchedule->class->name ?? 'N/A' }}</td>
                                            <td>{{ $booking->classSchedule->instructor->instructor->name ?? 'N/A' }}</td>
                                            <td>{{ $booking->classSchedule->start_time->format('d M Y') }}</td>
                                            <td>
                                                <button wire:click="openCreateModal({{ $booking->id }})"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="bi bi-star"></i> Beri Ulasan
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                {{-- Filter dan Search --}}
                <div class="col-12 mb-4 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Cari Ulasan</label>
                                    <input type="text" class="form-control" wire:model.live="search"
                                        placeholder="Cari nama kelas, instruktur, komentar...">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Filter Rating</label>
                                    <select class="form-select" wire:model.live="ratingFilter">
                                        <option value="">Semua Rating</option>
                                        <option value="5">⭐⭐⭐⭐⭐ (5 Bintang)</option>
                                        <option value="4">⭐⭐⭐⭐ (4 Bintang)</option>
                                        <option value="3">⭐⭐⭐ (3 Bintang)</option>
                                        <option value="2">⭐⭐ (2 Bintang)</option>
                                        <option value="1">⭐ (1 Bintang)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Daftar Ulasan --}}
                @forelse ($reviews as $review)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0">{{ $review->booking->classSchedule->class->name ?? 'N/A' }}</h5>
                                <div class="text-warning">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <=$review->rating)
                                        <i class="bi bi-star-fill"></i>
                                        @else
                                        <i class="bi bi-star"></i>
                                        @endif
                                        @endfor
                                </div>
                            </div>

                            <div class="mb-3">
                                <span class="badge bg-light-primary">
                                    <i class="bi bi-tag"></i> {{ $review->booking->classSchedule->class->type->name ?? 'N/A' }}
                                </span>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">
                                    <i class="bi bi-person"></i> Instruktur: <strong>{{ $review->booking->classSchedule->instructor->instructor->name ?? 'N/A' }}</strong>
                                </small>
                            </div>

                            <div class="mb-3">
                                <small class="text-muted">
                                    <i class="bi bi-calendar3"></i> Kelas: {{ $review->booking->classSchedule->start_time->format('d M Y') }}
                                </small>
                            </div>

                            @if($review->comment)
                            <div class="mb-3">
                                <p class="text-muted small mb-0">
                                    <i class="bi bi-chat-quote"></i>
                                    "{{ $review->comment }}"
                                </p>
                            </div>
                            @endif

                            <hr>

                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    {{ $review->created_at->format('d M Y') }}
                                </small>

                                <div>
                                    <button wire:click="openEditModal({{ $review->id }})"
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i> Edit
                                    </button>
                                    <button wire:click="deleteReview({{ $review->id }})"
                                        wire:confirm="Yakin ingin menghapus ulasan ini?"
                                        class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <i class="bi bi-star" style="font-size: 3rem; color: #ccc;"></i>
                            <p class="mt-3 text-muted">Belum ada ulasan yang ditemukan</p>
                            @if($reviewableBookings->count() > 0)
                            <p class="text-muted small">Anda memiliki {{ $reviewableBookings->count() }} kelas yang bisa diulas</p>
                            @endif
                        </div>
                    </div>
                </div>
                @endforelse

                {{-- Pagination --}}
                @if ($reviews->hasPages())
                <div class="col-12 mt-4">
                    <div class="d-flex justify-content-center">
                        {{ $reviews->links() }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Modal Create/Edit Review --}}
    @if($showModal)
    <div class="modal fade show" style="display: block; background: rgba(0,0,0,0.5);" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $editMode ? 'Edit Ulasan' : 'Beri Ulasan' }}</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    @if($selectedBooking)
                    <div class="mb-3">
                        <h6>{{ $selectedBooking->classSchedule->class->name ?? 'N/A' }}</h6>
                        <small class="text-muted">
                            Instruktur: {{ $selectedBooking->classSchedule->instructor->instructor->name ?? 'N/A' }} <br>
                            Tanggal: {{ $selectedBooking->classSchedule->start_time->format('d M Y, H:i') }}
                        </small>
                    </div>
                    <hr>
                    @endif

                    <form wire:submit.prevent="saveReview">
                        <div class="mb-3">
                            <label class="form-label">Rating <span class="text-danger">*</span></label>
                            <div class="rating-stars mb-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <span class="star {{ $rating >= $i ? 'active' : '' }}"
                                    wire:click="$set('rating', {{ $i }})"
                                    style="cursor: pointer; font-size: 32px; color: {{ $rating >= $i ? '#ffc107' : '#dee2e6' }};">
                                    ★
                                    </span>
                                    @endfor
                            </div>
                            <small class="text-muted">Rating: {{ $rating }} bintang</small>
                            @error('rating')
                            <small class="text-danger d-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Komentar</label>
                            <textarea class="form-control @error('comment') is-invalid @enderror"
                                wire:model="comment"
                                rows="4"
                                placeholder="Bagikan pengalaman Anda..."></textarea>
                            @error('comment')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-secondary" wire:click="closeModal">Batal</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> {{ $editMode ? 'Update' : 'Simpan' }} Ulasan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>