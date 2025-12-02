<?php $__env->startSection('content'); ?>
   <section class="hero" id="hero">
        <div class="container">
            <div class="hero-content">
                <h1>
                    Temukan Alurmu, Seimbangkan Hidupmu
                </h1>
                <p>
                    Bergabunglah dengan komunitas kesehatan kami. Pesan kelas yoga favoritmu dengan mudah dan mulailah perjalanan menuju kedamaian batin hari ini.
                </p>
                <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Pesan Kelas Sekarang !</a>
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
                <div class="col-md-4 text-md-end">
                    <a href="#" class="text-decoration-none text-success fw-bold">Lihat Kalender Lengkap &rarr;</a>
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
                            <tr>
                                <td class="ps-4 fw-bold text-muted">07:00 WIB</td>
                                <td>
                                    <span class="d-block fw-bold">Morning Hatha</span>
                                    <small class="text-muted">Studio A</small>
                                </td>
                                <td>Budi Santoso</td>
                                <td><span class="badge bg-info bg-opacity-10 text-info rounded-pill">Pemula</span></td>
                                <td class="text-end pe-4">
                                    <a href="<?php echo e(route('login')); ?>" class="btn btn-sm btn-yoga px-3">Pesan</a>
                                </td>
                            </tr>

                            <tr>
                                <td class="ps-4 fw-bold text-muted">09:00 WIB</td>
                                <td>
                                    <span class="d-block fw-bold">Power Vinyasa</span>
                                    <small class="text-muted">Studio B</small>
                                </td>
                                <td>Sarah Jane</td>
                                <td><span class="badge bg-danger bg-opacity-10 text-danger rounded-pill">Lanjutan</span></td>
                                <td class="text-end pe-4">
                                    <button class="btn btn-sm btn-secondary px-3" disabled>Daftar Tunggu</button>
                                </td>
                            </tr>

                            <tr>
                                <td class="ps-4 fw-bold text-muted">17:30 WIB</td>
                                <td>
                                    <span class="d-block fw-bold">Sunset Flow</span>
                                    <small class="text-muted">Studio C</small>
                                </td>
                                <td>Maya Putri</td>
                                <td><span class="badge bg-warning bg-opacity-10 text-warning rounded-pill">Semua Level</span></td>
                                <td class="text-end pe-4">
                                    <a href="<?php echo e(route('login')); ?>" class="btn btn-sm btn-yoga px-3">Pesan</a>
                                </td>
                            </tr>
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
                <div class="col-6 col-md-3">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=400&auto=format&fit=crop&q=60"
                        alt="Instruktur" class="rounded-circle mb-3 shadow-sm" style="width: 120px; height: 120px; object-fit: cover;">
                    <h5 class="fw-bold mb-1">Sarah Jane</h5>
                    <small class="text-muted">Ahli Vinyasa</small>
                </div>
                <div class="col-6 col-md-3">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&auto=format&fit=crop&q=60"
                        alt="Instruktur" class="rounded-circle mb-3 shadow-sm" style="width: 120px; height: 120px; object-fit: cover;">
                    <h5 class="fw-bold mb-1">Budi Santoso</h5>
                    <small class="text-muted">Spesialis Hatha</small>
                </div>
                <div class="col-6 col-md-3">
                    <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400&auto=format&fit=crop&q=60"
                        alt="Instruktur" class="rounded-circle mb-3 shadow-sm" style="width: 120px; height: 120px; object-fit: cover;">
                    <h5 class="fw-bold mb-1">Maya Putri</h5>
                    <small class="text-muted">Pemandu Meditasi</small>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('components.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\bismillah-PJfix\resources\views/welcome.blade.php ENDPATH**/ ?>