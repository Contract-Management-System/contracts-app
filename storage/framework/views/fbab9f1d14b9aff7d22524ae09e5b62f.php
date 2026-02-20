<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Sign in'); ?> — ContractVault</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('head'); ?>
</head>
<body class="min-h-screen bg-slate-50 flex">

    
    <div class="hidden lg:flex lg:w-2/5 xl:w-1/3 bg-ink-900 flex-col justify-between p-12 relative overflow-hidden">
        
        <div class="absolute inset-0 opacity-5"
             style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 24px 24px;"></div>

        <a href="<?php echo e(route('home')); ?>" class="relative flex items-center gap-2.5 text-white font-display text-xl font-semibold">
            <?php echo $__env->make('partials.logo', ['light' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </a>

        <div class="relative">
            <blockquote class="text-slate-300 text-lg font-display italic leading-relaxed mb-6">
                "The single source of truth for every agreement we've ever signed."
            </blockquote>
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-ink-700 flex items-center justify-center text-xs font-semibold text-white">KP</div>
                <div>
                    <p class="text-white text-sm font-medium">Kemi Pryce</p>
                    <p class="text-slate-500 text-xs">Legal Lead, Horizon Corp</p>
                </div>
            </div>
        </div>

        <p class="relative text-slate-600 text-xs">&copy; <?php echo e(date('Y')); ?> ContractVault</p>
    </div>

    
    <div class="flex-1 flex flex-col justify-center px-6 py-12 sm:px-12 lg:px-20 xl:px-28">
        <div class="w-full max-w-md mx-auto">

            
            <a href="<?php echo e(route('home')); ?>" class="lg:hidden flex items-center gap-2 mb-10">
                <?php echo $__env->make('partials.logo', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </a>

            <?php echo $__env->make('partials.flash', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\contracts-app\contracts-app\resources\views/layouts/auth.blade.php ENDPATH**/ ?>