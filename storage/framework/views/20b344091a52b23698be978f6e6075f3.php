<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>
<?php $__env->startSection('page-breadcrumb', 'Overview of your contracts'); ?>

<?php $__env->startSection('content'); ?>


<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

    <?php
    $stats = [
        [
            'label'   => 'Active',
            'value'   => $stats['active']    ?? 0,
            'color'   => 'green',
            'route'   => 'contracts.index',
            'query'   => ['status' => 'active'],
            'icon'    => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
        ],
        [
            'label'   => 'Expiring Soon',
            'value'   => $stats['expiring']  ?? 0,
            'color'   => 'amber',
            'route'   => 'contracts.expiring',
            'query'   => [],
            'icon'    => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>',
        ],
        [
            'label'   => 'Expired',
            'value'   => $stats['expired']   ?? 0,
            'color'   => 'red',
            'route'   => 'contracts.index',
            'query'   => ['status' => 'expired'],
            'icon'    => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
        ],
        [
            'label'   => 'Drafts',
            'value'   => $stats['draft']     ?? 0,
            'color'   => 'slate',
            'route'   => 'contracts.drafts',
            'query'   => [],
            'icon'    => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>',
        ],
    ];
    ?>

    <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <a href="<?php echo e(route($s['route'], $s['query'])); ?>"
       class="card p-5 group hover:border-<?php echo e($s['color']); ?>-200 hover:shadow-panel transition-all duration-200">
        <div class="flex items-start justify-between mb-3">
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400"><?php echo e($s['label']); ?></p>
            <svg class="w-4.5 h-4.5 text-<?php echo e($s['color']); ?>-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <?php echo $s['icon']; ?>

            </svg>
        </div>
        <p class="text-3xl font-display font-semibold text-slate-900"><?php echo e($s['value']); ?></p>
    </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>


<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

    
    <div class="lg:col-span-2 card">
        <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between">
            <h2 class="text-sm font-semibold text-slate-900">Recent Contracts</h2>
            <a href="<?php echo e(route('contracts.index')); ?>" class="text-xs text-ink-600 hover:text-ink-800 font-medium">View all →</a>
        </div>

        <?php if($recentContracts->count()): ?>
        <table class="table-base">
            <thead>
                <tr>
                    <th>Contract</th>
                    <th>Type</th>
                    <th>Expires</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $recentContracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="cursor-pointer" onclick="window.location='<?php echo e(route('contracts.show', $contract)); ?>'">
                    <td>
                        <p class="font-medium text-slate-900 text-sm"><?php echo e($contract->title); ?></p>
                        <p class="text-xs text-slate-400"><?php echo e($contract->counterparty); ?></p>
                    </td>
                    <td class="text-slate-500 text-xs"><?php echo e($contract->type); ?></td>
                    <td class="font-mono text-xs text-slate-500">
                        <?php echo e($contract->end_date?->format('d M Y') ?? '—'); ?>

                    </td>
                    <td><?php echo $__env->make('partials.status-badge', ['status' => $contract->status], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php else: ?>
        <div class="empty-state py-12">
            <svg class="empty-state-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <p class="text-sm font-medium text-slate-500 mb-1">No contracts yet</p>
            <a href="<?php echo e(route('contracts.create')); ?>" class="text-xs text-ink-600 hover:text-ink-800 font-medium mt-2 inline-block">
                Add your first contract →
            </a>
        </div>
        <?php endif; ?>
    </div>

    
    <div class="card">
        <div class="px-5 py-4 border-b border-slate-100">
            <h2 class="text-sm font-semibold text-slate-900">Expiring in 30 days</h2>
        </div>

        <?php if($expiringSoon->count()): ?>
        <ul class="divide-y divide-slate-50">
            <?php $__currentLoopData = $expiringSoon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="px-5 py-3.5">
                <a href="<?php echo e(route('contracts.show', $c)); ?>" class="block group">
                    <p class="text-sm font-medium text-slate-900 group-hover:text-ink-700 transition-colors truncate">
                        <?php echo e($c->title); ?>

                    </p>
                    <p class="text-xs text-slate-400 mt-0.5 flex items-center gap-1">
                        <svg class="w-3 h-3 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        Expires <?php echo e($c->end_date->diffForHumans()); ?>

                    </p>
                </a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <?php else: ?>
        <div class="empty-state py-10">
            <p class="text-sm text-slate-400">No contracts expiring soon 🎉</p>
        </div>
        <?php endif; ?>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\contracts-app\contracts-app\resources\views/pages/dashboard/index.blade.php ENDPATH**/ ?>