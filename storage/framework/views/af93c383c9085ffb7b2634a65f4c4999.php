<?php if (isset($component)) { $__componentOriginale03669022db5c974dc819e252c6e356a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale03669022db5c974dc819e252c6e356a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.auth-layout','data' => ['title' => 'Gymora Login']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.auth-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Gymora Login']); ?>

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
                                <input type="email" wire:model.defer="email" placeholder="win@gmail.com" required>
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
                                <input type="password" wire:model.defer="password" placeholder="Tebak apa hayoo" required>
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

                        <div class="form-remember">
                            <label class="remember-me">
                                <input type="checkbox" wire:model.defer="remember">
                                <span>Ingat Saya</span>
                            </label>
                            <a href="#" class="forgot-password">Lupa Password?</a>
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
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale03669022db5c974dc819e252c6e356a)): ?>
<?php $attributes = $__attributesOriginale03669022db5c974dc819e252c6e356a; ?>
<?php unset($__attributesOriginale03669022db5c974dc819e252c6e356a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale03669022db5c974dc819e252c6e356a)): ?>
<?php $component = $__componentOriginale03669022db5c974dc819e252c6e356a; ?>
<?php unset($__componentOriginale03669022db5c974dc819e252c6e356a); ?>
<?php endif; ?><?php /**PATH D:\bismillah-PJfix\resources\views/livewire/auth/login.blade.php ENDPATH**/ ?>