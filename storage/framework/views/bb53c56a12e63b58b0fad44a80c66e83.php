
<footer class="border-t border-slate-100 bg-white py-8 mt-auto">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
        <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2">
            <?php echo $__env->make('partials.logo', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </a>
        <p class="text-xs text-slate-400">
            &copy; <?php echo e(date('Y')); ?> ContractVault. All rights reserved.
        </p>
    </div>
</footer>
<?php /**PATH C:\xampp\htdocs\contracts-app\contracts-app\resources\views/partials/public-footer.blade.php ENDPATH**/ ?>