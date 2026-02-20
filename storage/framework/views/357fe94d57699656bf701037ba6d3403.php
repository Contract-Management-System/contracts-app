<?php $__env->startSection('title', 'Expiring Soon'); ?>
<?php $__env->startSection('page-title', 'Expiring Soon'); ?>
<?php $__env->startSection('page-breadcrumb', 'Contracts expiring in the next 90 days'); ?>

<?php $__env->startSection('content'); ?>

<?php if($contracts->count()): ?>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route('contracts.show', $contract)); ?>"
       class="card-interactive p-5 flex flex-col gap-3">

        <div class="flex items-start justify-between gap-2">
            <div class="flex-1 min-w-0">
                <p class="font-semibold text-slate-900 truncate"><?php echo e($contract->title); ?></p>
                <?php if($contract->counterparty): ?>
                <p class="text-xs text-slate-400 mt-0.5"><?php echo e($contract->counterparty); ?></p>
                <?php endif; ?>
            </div>
            <?php echo $__env->make('partials.status-badge', ['status' => $contract->status], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        
        <?php
            $total    = $contract->start_date ? $contract->start_date->diffInDays($contract->end_date) : 365;
            $elapsed  = $contract->start_date ? $contract->start_date->diffInDays(now()) : 0;
            $progress = $total > 0 ? min(100, round(($elapsed / $total) * 100)) : 100;
            $daysLeft = now()->diffInDays($contract->end_date);
        ?>

        <div>
            <div class="flex justify-between items-center mb-1">
                <span class="text-xxs text-slate-400 uppercase tracking-wider">Time elapsed</span>
                <span class="text-xs font-semibold
                    <?php echo e($daysLeft <= 14 ? 'text-red-600' : ($daysLeft <= 30 ? 'text-amber-600' : 'text-slate-600')); ?>">
                    <?php echo e($daysLeft); ?>d left
                </span>
            </div>
            <div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
                <div class="h-full rounded-full transition-all
                    <?php echo e($daysLeft <= 14 ? 'bg-red-400' : ($daysLeft <= 30 ? 'bg-amber-400' : 'bg-ink-400')); ?>"
                     style="width: <?php echo e($progress); ?>%"></div>
            </div>
        </div>

        <p class="text-xs text-slate-500 flex items-center gap-1">
            <svg class="w-3 h-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            Expires <?php echo e($contract->end_date->format('d M Y')); ?>

        </p>

    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php else: ?>
<div class="empty-state">
    <div class="text-5xl mb-4">🎉</div>
    <p class="text-sm font-medium text-slate-600 mb-1">No contracts expiring soon</p>
    <p class="text-xs text-slate-400">You're all clear for the next 90 days.</p>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\contracts-app\contracts-app\resources\views/pages/contracts/expiring.blade.php ENDPATH**/ ?>