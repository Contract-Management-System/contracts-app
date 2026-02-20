<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'ContractVault'); ?> — ContractVault</title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Track, manage, and never miss a contract deadline.'); ?>">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo $__env->yieldPushContent('head'); ?>
</head>
<body class="bg-white text-slate-800 min-h-screen flex flex-col">

    
    <?php echo $__env->make('partials.public-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <?php echo $__env->make('partials.flash', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <main class="flex-1">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <?php echo $__env->make('partials.public-footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\contracts-app\contracts-app\resources\views/layouts/public.blade.php ENDPATH**/ ?>