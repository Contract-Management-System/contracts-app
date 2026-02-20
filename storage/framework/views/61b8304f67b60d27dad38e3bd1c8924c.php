<?php $__env->startSection('title', '404 Not Found'); ?>
<?php $__env->startSection('content'); ?>
<section class="flex items-center justify-center min-h-[60vh] px-4">
    <div class="text-center">
        <p class="text-7xl font-display font-semibold text-slate-200 mb-4">404</p>
        <h1 class="text-xl font-semibold text-slate-800 mb-2">Page not found</h1>
        <p class="text-slate-400 text-sm mb-8">The page you're looking for doesn't exist.</p>
        <a href="<?php echo e(route('home')); ?>" class="btn-primary">Go home</a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\contracts-app\contracts-app\resources\views/errors/404.blade.php ENDPATH**/ ?>