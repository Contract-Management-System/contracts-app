
<header class="h-16 bg-white border-b border-slate-100 flex items-center px-6 gap-4 shrink-0">

    
    <button @click="sidebarOpen = !sidebarOpen"
            class="lg:hidden btn-icon btn-ghost mr-1">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    
    <div class="flex-1 min-w-0">
        <h1 class="text-sm font-semibold text-slate-900 truncate">
            <?php echo $__env->yieldContent('page-title', 'Dashboard'); ?>
        </h1>
        <?php if (! empty(trim($__env->yieldContent('page-breadcrumb')))): ?>
        <p class="text-xs text-slate-400 truncate"><?php echo $__env->yieldContent('page-breadcrumb'); ?></p>
        <?php endif; ?>
    </div>

    
    <div class="flex items-center gap-2">

        
        <a href="<?php echo e(route('contracts.create')); ?>" class="btn-primary btn-sm hidden sm:inline-flex">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            New Contract
        </a>

        
        <button class="btn-icon btn-ghost relative" title="Notifications">
            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
            <?php if(($expiringSoonCount ?? 0) > 0): ?>
            <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-amber-500"></span>
            <?php endif; ?>
        </button>

    </div>
</header>
<?php /**PATH C:\xampp\htdocs\contracts-app\contracts-app\resources\views/partials/topbar.blade.php ENDPATH**/ ?>