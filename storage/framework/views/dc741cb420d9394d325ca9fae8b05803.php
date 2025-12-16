<div>
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 mb-4">
                    <h3>Jadwal Kelas</h3>
                    <p class="text-subtitle text-muted">Pilih jadwal kelas dan lakukan booking</p>
                </div>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session()->has('success')): ?>
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle"></i> <?php echo e(session('success')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(session()->has('error')): ?>
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle"></i> <?php echo e(session('error')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                
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
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($class->id); ?>"><?php echo e($class->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Filter Lokasi</label>
                                    <select wire:model.live="locationFilter" class="form-select">
                                        <option value="">Semua Ruangan</option>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($location); ?>"><?php echo e($location); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($schedules->count() > 0): ?>
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
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $schedules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schedule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $bookedCount = $schedule->bookings()->where('status', 'confirmed')->count();
                                                    $isFull = $bookedCount >= $schedule->max_capacity;
                                                    $isBooked = $schedule->bookings()->where('user_id', auth()->id())->whereIn('status', ['pending', 'confirmed'])->exists();
                                                    $isInWaitingList = \App\Models\WaitingList::where('user_id', auth()->id())->where('class_schedule_id', $schedule->id)->exists();
                                                ?>
                                                <tr>
                                                    <td>
                                                        <strong><?php echo e($schedule->class->name); ?></strong>
                                                        <br>
                                                        <small class="text-muted"><?php echo e($schedule->class->type->name); ?></small>
                                                    </td>
                                                    <td>
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($schedule->instructor && $schedule->instructor->instructor): ?>
                                                            <?php echo e($schedule->instructor->instructor->name); ?>

                                                        <?php else: ?>
                                                            <span class="text-muted">-</span>
                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <i class="bi bi-calendar3"></i> <?php echo e($schedule->start_time->format('d M Y')); ?>

                                                        <br>
                                                        <i class="bi bi-clock"></i> <?php echo e($schedule->start_time->format('H:i')); ?> - <?php echo e($schedule->end_time->format('H:i')); ?>

                                                    </td>
                                                    <td><?php echo e($schedule->location); ?></td>
                                                    <td>
                                                        <span class="badge bg-light-<?php echo e($isFull ? 'danger' : 'success'); ?>">
                                                            <?php echo e($bookedCount); ?>/<?php echo e($schedule->max_capacity); ?>

                                                        </span>
                                                    </td>
                                                    <td>
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isBooked): ?>
                                                            <button class="btn btn-sm btn-secondary" disabled>
                                                                <i class="bi bi-check-circle"></i> Sudah Booking
                                                            </button>
                                                        <?php elseif($isInWaitingList): ?>
                                                            <button class="btn btn-sm btn-warning" disabled>
                                                                <i class="bi bi-hourglass-split"></i> Daftar Tunggu
                                                            </button>
                                                        <?php else: ?>
                                                            <button wire:click="booking(<?php echo e($schedule->id); ?>)" 
                                                                    class="btn btn-sm <?php echo e($isFull ? 'btn-warning' : 'btn-primary'); ?>"
                                                                    wire:loading.attr="disabled"
                                                                    wire:target="booking(<?php echo e($schedule->id); ?>)">
                                                                <span wire:loading.remove wire:target="booking(<?php echo e($schedule->id); ?>)">
                                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isFull): ?>
                                                                        <i class="bi bi-hourglass-split"></i> Daftar Tunggu
                                                                    <?php else: ?>
                                                                        <i class="bi bi-calendar-plus"></i> Booking
                                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                                </span>
                                                                <span wire:loading wire:target="booking(<?php echo e($schedule->id); ?>)">
                                                                    <span class="spinner-border spinner-border-sm" role="status"></span>
                                                                    Memproses...
                                                                </span>
                                                            </button>
                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="mt-3">
                                    <?php echo e($schedules->links()); ?>

                                </div>
                            <?php else: ?>
                                <div class="text-center py-5">
                                    <i class="bi bi-calendar-x" style="font-size: 3rem; opacity: 0.3;"></i>
                                    <p class="text-muted mt-3">Tidak ada jadwal yang tersedia</p>
                                    <a href="<?php echo e(route('member.kelas')); ?>" class="btn btn-primary mt-2">
                                        <i class="bi bi-arrow-left"></i> Kembali ke Daftar Kelas
                                    </a>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php /**PATH D:\bismillah-PJfixyaa\bismillah-PJfix\resources\views/livewire/member/jadwal-kelas.blade.php ENDPATH**/ ?>