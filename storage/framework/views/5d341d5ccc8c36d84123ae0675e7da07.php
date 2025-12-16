<div>
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 mb-4">
                    <h3>Daftar Tunggu</h3>
                    <p class="text-subtitle text-muted">Kelola daftar tunggu kelas yang penuh</p>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('message')): ?>
                    <div class="col-12">
                        <div class="alert alert-<?php echo e(session('alert-type')); ?> alert-dismissible fade show" role="alert">
                            <?php echo e(session('message')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldPaper"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Daftar Tunggu</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($totalDaftarTunggu); ?></h6>
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
                                    <h6 class="text-muted font-semibold">Daftar Tunggu Aktif</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($daftarTungguAktif); ?></h6>
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
                                        <i class="iconly-boldStar"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Posisi Terbaik</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($posisiTerbaik > 0 ? '#' . $posisiTerbaik : '-'); ?></h6>
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
                                    <h6 class="text-muted font-semibold">Estimasi Waktu</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($estimasiWaktu > 0 ? $estimasiWaktu . ' ' . $estimasiWaktuUnit : '-'); ?></h6>
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
                                    <div class="stats-icon purple mb-2">
                                        <i class="iconly-boldTicket"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Kelas Tersedia</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($kelasTersedia); ?></h6>
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
                                        <i class="iconly-boldDanger"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Kelas Penuh</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($kelasPenuh); ?></h6>
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
                                        <i class="iconly-boldCategory"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Kelas Menunggu</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($totalKelasMenunggu); ?></h6>
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
                                        <i class="iconly-boldChart"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Rata-rata Posisi</h6>
                                    <h6 class="font-extrabold mb-0"><?php echo e($rataRataPosisi > 0 ? '#' . $rataRataPosisi : '-'); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-12 mb-4 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Cari Daftar Tunggu</label>
                                    <input type="text" class="form-control" wire:model.live="search" placeholder="Cari nama kelas, instruktur...">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Filter Status</label>
                                    <select class="form-select" wire:model.live="statusFilter">
                                        <option value="">Semua Status</option>
                                        <option value="active">Aktif</option>
                                        <option value="expired">Kadaluarsa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $waitingLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $waiting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0"><?php echo e($waiting->classSchedule->class->name ?? 'N/A'); ?></h5>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($waiting->classSchedule->start_time > now()): ?>
                                    <span class="badge bg-warning">Aktif</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Kadaluarsa</span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            
                            <div class="mb-3">
                                <span class="badge bg-light-primary">
                                    <i class="bi bi-tag"></i> <?php echo e($waiting->classSchedule->class->type->name ?? 'N/A'); ?>

                                </span>
                                <span class="badge bg-light-info ms-1">
                                    <i class="bi bi-hash"></i> Posisi: <?php echo e($this->getPosition($waiting->id)); ?>

                                </span>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">
                                    <i class="bi bi-person"></i> Instruktur: <strong><?php echo e($waiting->classSchedule->instructor->instructor->name ?? 'N/A'); ?></strong>
                                </small>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">
                                    <i class="bi bi-calendar3"></i> <?php echo e($waiting->classSchedule->start_time->format('d M Y, H:i') ?? 'N/A'); ?>

                                </small>
                            </div>

                            <div class="mb-2">
                                <small class="text-muted">
                                    <i class="bi bi-clock"></i> Durasi: <?php echo e($waiting->classSchedule->start_time->format('H:i')); ?> - <?php echo e($waiting->classSchedule->end_time->format('H:i')); ?>

                                </small>
                            </div>

                            <div class="mb-3">
                                <small class="text-muted">
                                    <i class="bi bi-geo-alt"></i> <?php echo e($waiting->classSchedule->location ?? 'N/A'); ?>

                                </small>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    Terdaftar: <?php echo e($waiting->registered_at->format('d M Y')); ?>

                                </small>
                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($waiting->classSchedule->start_time > now()): ?>
                                    <button wire:click="cancelWaitingList(<?php echo e($waiting->id); ?>)" 
                                            wire:confirm="Yakin ingin keluar dari daftar tunggu?"
                                            class="btn btn-sm btn-danger">
                                        <i class="bi bi-x-circle"></i> Batal
                                    </button>
                                <?php else: ?>
                                    <button class="btn btn-sm btn-secondary" disabled>
                                        <i class="bi bi-clock-history"></i> Selesai
                                    </button>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center py-5">
                            <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc;"></i>
                            <p class="mt-3 text-muted">Tidak ada daftar tunggu yang ditemukan</p>
                            <a href="<?php echo e(route('member.kelas')); ?>" class="btn btn-primary mt-2">
                                <i class="bi bi-plus-circle"></i> Jelajahi Kelas
                            </a>
                        </div>
                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($waitingLists->hasPages()): ?>
                <div class="col-12 mt-4">
                    <div class="d-flex justify-content-center">
                        <?php echo e($waitingLists->links()); ?>

                    </div>
                </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>
</div>
<?php /**PATH D:\bismillah-PJfixyaa\bismillah-PJfix\resources\views/livewire/member/daftar-tunggu.blade.php ENDPATH**/ ?>