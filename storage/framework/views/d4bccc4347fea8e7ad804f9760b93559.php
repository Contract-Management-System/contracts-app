<?php $__env->startSection('title', 'Drafts'); ?>
<?php $__env->startSection('page-title', 'Drafts'); ?>
<?php $__env->startSection('page-breadcrumb', 'Contracts not yet published'); ?>

<?php $__env->startSection('content'); ?>

<?php if($contracts->count()): ?>
<div class="card">
    <table class="table-base">
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Created</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $contracts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contract): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <a href="<?php echo e(route('contracts.show', $contract)); ?>" class="font-medium text-slate-900 hover:text-ink-700 transition-colors">
                        <?php echo e($contract->title); ?>

                    </a>
                    <?php if($contract->counterparty): ?>
                    <p class="text-xs text-slate-400"><?php echo e($contract->counterparty); ?></p>
                    <?php endif; ?>
                </td>
                <td class="text-xs text-slate-500"><?php echo e($contract->type ?? '—'); ?></td>
                <td class="text-xs text-slate-400 font-mono"><?php echo e($contract->created_at->format('d M Y')); ?></td>
                <td>
                    <div class="flex justify-end gap-1">
                        <a href="<?php echo e(route('contracts.edit', $contract)); ?>" class="btn-secondary btn-sm">Edit</a>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="px-5 py-4 border-t border-slate-100">
        <?php echo e($contracts->links()); ?>

    </div>
</div>
<?php else: ?>
<div class="empty-state">
    <p class="text-sm font-medium text-slate-500">No drafts</p>
    <a href="<?php echo e(route('contracts.create')); ?>" class="btn-primary btn-sm mt-4">Create a contract</a>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\contracts-app\contracts-app\resources\views/pages/contracts/drafts.blade.php ENDPATH**/ ?>