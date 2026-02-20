<?php $__env->startSection('title', 'Contracts'); ?>
<?php $__env->startSection('page-title', 'All Contracts'); ?>
<?php $__env->startSection('page-breadcrumb', $contracts->total() . ' total contracts'); ?>

<?php $__env->startSection('content'); ?>


<div class="flex flex-col sm:flex-row sm:items-center gap-3 mb-5">

    
    <form method="GET" action="<?php echo e(route('contracts.index')); ?>" class="flex-1 flex gap-2">
        <div class="relative flex-1 max-w-sm">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                   class="input pl-9" placeholder="Search contracts…">
        </div>

        
        <select name="status" onchange="this.form.submit()"
                class="input w-auto py-2 text-sm">
            <option value="">All statuses</option>
            <option value="active"   <?php echo e(request('status') === 'active'   ? 'selected' : ''); ?>>Active</option>
            <option value="expiring" <?php echo e(request('status') === 'expiring' ? 'selected' : ''); ?>>Expiring</option>
            <option value="expired"  <?php echo e(request('status') === 'expired'  ? 'selected' : ''); ?>>Expired</option>
            <option value="draft"    <?php echo e(request('status') === 'draft'    ? 'selected' : ''); ?>>Draft</option>
            <option value="pending"  <?php echo e(request('status') === 'pending'  ? 'selected' : ''); ?>>Pending</option>
        </select>

        
        <select name="type" onchange="this.form.submit()"
                class="input w-auto py-2 text-sm hidden sm:block">
            <option value="">All types</option>
            <?php $__currentLoopData = \App\Models\Contract::TYPES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($type); ?>" <?php echo e(request('type') === $type ? 'selected' : ''); ?>><?php echo e($type); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </form>

    
    <a href="<?php echo e(route('contracts.create')); ?>" class="btn-primary shrink-0">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        New Contract
    </a>
</div>


<div class="card">
    <?php if($contracts->count()): ?>
    <table class="table-base">
        <thead>
            <tr>
                <th>Title / Counterparty</th>
                <th>Type</th>
                <th>Value</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <a href="<?php echo e(route('contracts.show', $contract)); ?>"
                       class="block group">
                        <p class="font-medium text-slate-900 group-hover:text-ink-700 transition-colors">
                            <?php echo e($contract->title); ?>

                        </p>
                        <?php if($contract->counterparty): ?>
                        <p class="text-xs text-slate-400 mt-0.5"><?php echo e($contract->counterparty); ?></p>
                        <?php endif; ?>
                    </a>
                </td>
                <td>
                    <span class="text-xs text-slate-500 bg-slate-50 px-2 py-0.5 rounded-full border border-slate-100">
                        <?php echo e($contract->type ?? '—'); ?>

                    </span>
                </td>
                <td class="font-mono text-xs text-slate-600">
                    <?php if($contract->value): ?>
                        <?php echo e(number_format($contract->value, 0, '.', ',')); ?>

                        <span class="text-slate-400"><?php echo e($contract->currency); ?></span>
                    <?php else: ?>
                        <span class="text-slate-300">—</span>
                    <?php endif; ?>
                </td>
                <td class="font-mono text-xs text-slate-500">
                    <?php echo e($contract->start_date?->format('d M Y') ?? '—'); ?>

                </td>
                <td class="font-mono text-xs text-slate-500">
                    <?php if($contract->end_date): ?>
                        <span class="<?php echo e($contract->isExpiringSoon() ? 'text-amber-600 font-semibold' : ''); ?>">
                            <?php echo e($contract->end_date->format('d M Y')); ?>

                        </span>
                        <?php if($contract->isExpiringSoon()): ?>
                            <span class="text-amber-500 text-xxs block">
                                <?php echo e($contract->end_date->diffForHumans()); ?>

                            </span>
                        <?php endif; ?>
                    <?php else: ?>
                        <span class="text-slate-300">No end date</span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php echo $__env->make('partials.status-badge', ['status' => $contract->status], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </td>
                <td>
                    <div class="flex items-center gap-1 justify-end">
                        <a href="<?php echo e(route('contracts.show',   $contract)); ?>" class="btn-icon btn-ghost" title="View">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </a>
                        <a href="<?php echo e(route('contracts.edit',   $contract)); ?>" class="btn-icon btn-ghost" title="Edit">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>
                        <form method="POST" action="<?php echo e(route('contracts.destroy', $contract)); ?>"
                              onsubmit="return confirm('Delete this contract? This cannot be undone.')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn-icon btn-ghost text-red-400 hover:text-red-600 hover:bg-red-50" title="Delete">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    
    <div class="px-5 py-4 border-t border-slate-100">
        <?php echo e($contracts->withQueryString()->links()); ?>

    </div>

    <?php else: ?>
    <div class="empty-state py-20">
        <svg class="empty-state-icon w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
        </svg>
        <p class="text-sm font-medium text-slate-600 mb-1">
            <?php if(request()->hasAny(['search','status','type'])): ?>
                No contracts match your filters.
            <?php else: ?>
                No contracts yet.
            <?php endif; ?>
        </p>
        <?php if(!request()->hasAny(['search','status','type'])): ?>
        <a href="<?php echo e(route('contracts.create')); ?>" class="btn-primary btn-sm mt-3">
            Add your first contract
        </a>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\contracts-app\contracts-app\resources\views/pages/contracts/index.blade.php ENDPATH**/ ?>