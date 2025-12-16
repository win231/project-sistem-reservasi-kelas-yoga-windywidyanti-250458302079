@extends('components.layouts.app')

@section('content')
    <section class="hero" id="hero">
        <div class="container">
            <div class="hero-content">
                <h1>
                    Temukan Alurmu, Seimbangkan Hidupmu
                </h1>
                <p>
                    Bergabunglah dengan komunitas kesehatan kami. Pesan kelas yoga favoritmu dengan mudah dan mulailah perjalanan menuju kedamaian batin hari ini.
                </p>
                <a href="{{ route('login') }}" class="btn btn-primary">Pesan Kelas Sekarang !</a>
            </div>
            <div class="hero-image">
                <div class="image">
                    <img
                        src="https://i.pinimg.com/736x/bc/85/ee/bc85ee01b4ab171ee8e7c6c7ceabe6f6.jpg"
                        alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->

    <!-- layanan section -->
    <section class="layanan" id="kelas">
        <div class="container">
            <h2 class="layanan-title">Kelas Pilihan</h2>
            <p class="layanan-subtitle">Jelajahi kelas yang dirancang untuk setiap tingkat perjalanan Anda.</p>
            <div class="layanan-grid">
                <div class="layanan-card">
                    <div class="icon">🧘‍♀️</div>
                    <h3>Hatha Yoga</h3>
                    <p>
                        Pose yoga klasik yang berfokus pada keselarasan postur, keseimbangan, dan pernapasan sadar.
                    </p>
                </div>
                <div class="layanan-card">
                    <div class="icon">⚡</div>
                    <h3>Vinyasa Flow</h3>
                    <p>Kelas dinamis dan bertenaga, menyinkronkan gerakan dengan napas untuk meningkatkan kekuatan dan daya tahan.</p>
                </div>
                <div class="layanan-card">
                    <div class="icon">🌙</div>
                    <h3>Yin Yoga</h3>
                    <p>Peregangan mendalam dan relaksasi untuk melepaskan ketegangan serta menenangkan sistem saraf.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- end layanan -->

    <!-- jadwal -->
    <section id="jadwal" class="bg-light">
        <div class="container">
            <div class="row align-items-end mb-5">
                <div class="col-md-8">
                    <h2 class="fw-bold">Jadwal Harian</h2>
                    <p class="text-muted mb-0">Ketersediaan waktu nyata. Amankan tempat Anda sekarang.</p>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="py-3 ps-4">Waktu</th>
                                <th class="py-3">Nama Kelas</th>
                                <th class="py-3">Instruktur</th>
                                <th class="py-3">Tingkat</th>
                                <th class="py-3 pe-4 text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schedules as $schedule)
                            <tr>
                                <td class="ps-4 fw-bold text-muted">{{ $schedule['time'] }}</td>
                                <td>
                                    <span class="d-block fw-bold">{{ $schedule['class_name'] }}</span>
                                    <small class="text-muted">{{ $schedule['location'] }}</small>
                                </td>
                                <td>{{ $schedule['instructor_name'] }}</td>
                                <td>
                                    <span class="badge bg-{{ $schedule['level']['color'] }} bg-opacity-10 text-{{ $schedule['level']['color'] }} rounded-pill">
                                        {{ $schedule['level']['label'] }}
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    @if ($schedule['is_full'])
                                        <button class="btn btn-sm btn-secondary px-3" disabled>Penuh</button>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-sm btn-yoga px-3">Pesan</a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    Belum ada jadwal tersedia
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <section id="instructor" class="instructor">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Pemandu Kami</h2>
                <p class="text-muted">Pengajar berpengalaman yang berdedikasi untuk pertumbuhan Anda.</p>
            </div>
            <div class="row justify-content-center text-center g-5">
                @forelse ($instructors as $instructor)
                <div class="col-6 col-md-4">
                    <img src="{{ $instructor['photo'] }}"
                        alt="{{ $instructor['name'] }}" 
                        class="rounded-circle mb-3 shadow-sm" 
                        style="width: 120px; height: 120px; object-fit: cover;">
                    <h5 class="fw-bold mb-1">{{ $instructor['name'] }}</h5>
                    <small class="text-muted">{{ $instructor['specialization'] }}</small>
                </div>
                @empty
                <div class="col-12">
                    <p class="text-muted">Belum ada instruktur tersedia</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection