


<?php
$map = [
    'active'   => ['class' => 'badge-active',   'label' => 'Active'],
    'expiring' => ['class' => 'badge-expiring',  'label' => 'Expiring'],
    'expired'  => ['class' => 'badge-expired',   'label' => 'Expired'],
    'draft'    => ['class' => 'badge-draft',     'label' => 'Draft'],
    'pending'  => ['class' => 'badge-pending',   'label' => 'Pending'],
];
$s = $map[$status] ?? ['class' => 'badge-draft', 'label' => ucfirst($status)];
?>

<span class="<?php echo e($s['class']); ?>">
    <span class="w-1 h-1 rounded-full inline-block
        <?php if($status === 'active'): ?> bg-green-500
        <?php elseif($status === 'expiring'): ?> bg-amber-500
        <?php elseif($status === 'expired'): ?> bg-red-500
        <?php elseif($status === 'pending'): ?> bg-blue-500
        <?php else: ?> bg-slate-400
        <?php endif; ?>">
    </span>
    <?php echo e($s['label']); ?>

</span>
<?php /**PATH C:\xampp\htdocs\contracts-app\contracts-app\resources\views/partials/status-badge.blade.php ENDPATH**/ ?>