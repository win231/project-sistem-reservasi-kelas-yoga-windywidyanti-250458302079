<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Dashboard Member - Gymora Studio'); ?></title>

    <link rel="shortcut icon" href="<?php echo e(asset('mazer/assets/compiled/svg/favicon.svg')); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAA..." type="image/png">
    <link rel="stylesheet" href="<?php echo e(asset('mazer/assets/compiled/css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('mazer/assets/compiled/css/iconly.css')); ?>">

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    <div id="app">
        <div id="sidebar">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('partials.sidebar');

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-705997057-0', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-content">
                <?php echo e($slot); ?>

            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2025 &copy; Gymora Studio</p>
                    </div>
                    <div class="float-end">
                        <p>Stay Healthy, Stay Happy <span class="text-danger"><i class="bi bi-heart-fill"></i></span></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="<?php echo e(asset('mazer/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('mazer/assets/compiled/js/app.js')); ?>"></script>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html><?php /**PATH D:\bismillah-PJfixyaa\bismillah-PJfix\resources\views/member/layouts.blade.php ENDPATH**/ ?>