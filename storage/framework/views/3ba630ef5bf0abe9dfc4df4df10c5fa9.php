

<?php
$features = [
    [
        'icon'  => '📋',
        'title' => 'Centralised Repository',
        'desc'  => 'One place for every NDA, vendor agreement, SLA, and employment contract. Never dig through email again.',
    ],
    [
        'icon'  => '🔔',
        'title' => 'Smart Deadline Alerts',
        'desc'  => 'Get notified 90, 60, and 30 days before a contract expires — via email, Slack, or in-app.',
    ],
    [
        'icon'  => '📊',
        'title' => 'Status at a Glance',
        'desc'  => 'Dashboard gives you live counts of Active, Expiring, Expired, and Draft contracts instantly.',
    ],
    [
        'icon'  => '🔍',
        'title' => 'Powerful Search',
        'desc'  => 'Find any contract by name, counterparty, value, or type in milliseconds.',
    ],
    [
        'icon'  => '🗂️',
        'title' => 'Contract Types & Tags',
        'desc'  => 'Categorise by type (Vendor, Client, Employment, NDA…) and add custom tags for flexible filtering.',
    ],
    [
        'icon'  => '👥',
        'title' => 'Team Access Controls',
        'desc'  => 'Invite team members, assign ownership, and control who can view, edit, or delete contracts.',
    ],
];
?>

<section class="py-24 px-4 sm:px-6 lg:px-8 bg-slate-50 border-y border-slate-100">
    <div class="max-w-6xl mx-auto">

        <div class="mb-14">
            <p class="text-xs font-semibold uppercase tracking-widest text-ink-500 mb-3">Features</p>
            <h2 class="text-3xl sm:text-4xl font-display font-semibold text-slate-900 max-w-lg leading-snug">
                Built for teams who take contracts seriously
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-xl border border-slate-200 p-6 hover:border-ink-200 hover:shadow-panel transition-all duration-200">
                <div class="text-2xl mb-4"><?php echo e($f['icon']); ?></div>
                <h3 class="font-semibold text-slate-900 mb-2"><?php echo e($f['title']); ?></h3>
                <p class="text-sm text-slate-500 leading-relaxed"><?php echo e($f['desc']); ?></p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>
</section>
<?php /**PATH C:\xampp\htdocs\contracts-app\contracts-app\resources\views/pages/home/sections/features.blade.php ENDPATH**/ ?>