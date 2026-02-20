
<header class="sticky top-0 z-50 bg-white/95 backdrop-blur-sm border-b border-slate-100"
        x-data="{ open: false }">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">

        <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-2">
            <?php echo $__env->make('partials.logo', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </a>

        
        <div class="hidden md:flex items-center gap-2">
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(route('dashboard')); ?>" class="btn-secondary btn-sm">Dashboard</a>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>"    class="btn-ghost btn-sm">Sign in</a>
                <a href="<?php echo e(route('register')); ?>" class="btn-primary btn-sm">Get started</a>
            <?php endif; ?>
        </div>

        
        <button @click="open = !open" class="md:hidden btn-icon btn-ghost">
            <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg x-show="open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    
    <div x-show="open" x-collapse class="md:hidden border-t border-slate-100 bg-white">
        <div class="px-4 py-3 flex flex-col gap-2">
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(route('dashboard')); ?>" class="btn-secondary w-full justify-center">Dashboard</a>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>"    class="btn-ghost w-full justify-center">Sign in</a>
                <a href="<?php echo e(route('register')); ?>" class="btn-primary w-full justify-center">Get started</a>
            <?php endif; ?>
        </div>
    </div>
</header>
<?php /**PATH C:\xampp\htdocs\contracts-app\contracts-app\resources\views/partials/public-nav.blade.php ENDPATH**/ ?>