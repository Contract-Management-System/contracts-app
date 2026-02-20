<?php $__env->startSection('title', 'New Contract'); ?>
<?php $__env->startSection('page-title', 'New Contract'); ?>
<?php $__env->startSection('page-breadcrumb', 'Add a contract to your vault'); ?>

<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('contracts.store')); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo $__env->make('pages.contracts._form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\contracts-app\contracts-app\resources\views/pages/contracts/create.blade.php ENDPATH**/ ?>