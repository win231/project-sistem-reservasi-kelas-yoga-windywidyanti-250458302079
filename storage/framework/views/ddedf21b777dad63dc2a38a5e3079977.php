<div class="regis-page">
    <div class="container">
        <div class="regis-left">
            <div class="regis-title-left">
                <h2>Mulai Perjalanan Keseimbangan Anda!</h2>
                <p class="regis-subtitle-left">Buat Akun Anda Sekarang dan Akses Kelas Eksklusif Gymora Studio.</p>

                <!--  -->
                <form wire:submit.prevent="submit">
                    <?php echo csrf_field(); ?>

                    <!--  -->
                    <div class="form-group">
                        <label>Nama</label>
                        <div class="input-icon">
                            <input type="text" wire:model="name" placeholder="nama" required>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger small"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <!--  -->
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-icon">
                            <!--  -->
                            <input type="email" wire:model="email" placeholder="nama@gmail.com" required>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger small"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <!--  -->
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <div class="input-icon">
                            <select wire:model="gender" required id="gender" class="form-select <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="male">Pria</option>
                                <option value="female">Wanita</option>
                            </select>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger small"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <div class="input-icon">
                            <input type="phone" wire:model="phone" placeholder="nomor telepon" required>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger small"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <!--  -->
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-icon">
                            
                            <input type="password" wire:model="password" placeholder="password" required>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger small"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <!--  -->
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <div class="input-icon">
                            
                            <input type="password" wire:model="password_confirmation" placeholder="konfirmasi password" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-logis">Daftar Sekarang</button>

                    <div class="regis-divider">
                        <span>atau</span>
                    </div>

                    <p class="register-link">
                        Sudah punya akun? <a href="<?php echo e(route('login')); ?>">Masuk di sini.</a>
                    </p>
                </form>
            </div>
        </div>

        <div class="regis-right">
            <div class="regis-title">
                <h2>GYMORA STUDIO</h2>
                <p>Ruang Latihan Eksklusif Anda</p>
            </div>
            <div class="regis-image">
                <img src="https://i.pinimg.com/736x/2a/a4/99/2aa49909137da136b259bf66c1b79ebe.jpg" alt="">
            </div>
        </div>
    </div>
</div><?php /**PATH D:\bismillah-PJfixyaa\bismillah-PJfix\resources\views/livewire/auth/register.blade.php ENDPATH**/ ?>