<div class="login-page">
    <div class="container">
        <div class="login-left">
            <div class="login-title">
                <h2>GYMORA STUDIO</h2>
                <p>Ruang Latihan Eksklusif Anda</p>
            </div>
            <div class="login-image">
                <img src="https://i.pinimg.com/736x/2a/a4/99/2aa49909137da136b259bf66c1b79ebe.jpg" alt="">
            </div>
        </div>
        <div class="login-right">
            <div class="login-title-right">
                <h2>Selamat Datang di Gymora Studio!</h2>
                <p class="login-subtitle-right">Silakan Masuk untuk Memulai Sesi Yoga Anda.</p>

                <form wire:submit.prevent="submit">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-icon">
                            <span>📧</span>
                            <input type="email" wire:model.defer="email" placeholder="nama@gmail.com" required>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-icon">
                            <span>🔐</span>
                            <input type="password" wire:model.defer="password" placeholder="••••••••" required>
                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-logis">Masuk</button>

                    <div class="login-divider"><span>atau</span></div>

                    <p class="register-link">
                        Belum punya akun? <a href="<?php echo e(route('register')); ?>">Daftar Sekarang, Yuk!</a>
                    </p>
                </form>

            </div>
        </div>
    </div>
</div><?php /**PATH D:\bismillah-PJfixyaa\bismillah-PJfix\resources\views/livewire/auth/login.blade.php ENDPATH**/ ?>