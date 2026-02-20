<?php $__env->startSection('title', 'Account Settings'); ?>
<?php $__env->startSection('page-title', 'Account Settings'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-xl space-y-5">

    
    <div class="card p-6">
        <h2 class="text-sm font-semibold text-slate-900 mb-5 pb-3 border-b border-slate-100">Profile</h2>
        <form action="<?php echo e(route('account.update')); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
            <div>
                <label class="label" for="name">Full name</label>
                <input type="text" id="name" name="name" class="input"
                       value="<?php echo e(auth()->user()->name); ?>">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="field-error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <label class="label" for="email">Email address</label>
                <input type="email" id="email" name="email" class="input"
                       value="<?php echo e(auth()->user()->email); ?>">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="field-error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <button type="submit" class="btn-primary">Save changes</button>
        </form>
    </div>

    
    <div class="card p-6">
        <h2 class="text-sm font-semibold text-slate-900 mb-5 pb-3 border-b border-slate-100">Change Password</h2>
        <form action="<?php echo e(route('account.password')); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
            <div>
                <label class="label" for="current_password">Current password</label>
                <input type="password" id="current_password" name="current_password" class="input" placeholder="••••••••">
                <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="field-error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <label class="label" for="password">New password</label>
                <input type="password" id="password" name="password" class="input" placeholder="Min. 8 characters">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="field-error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div>
                <label class="label" for="password_confirmation">Confirm new password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="input" placeholder="Repeat new password">
            </div>
            <button type="submit" class="btn-primary">Update password</button>
        </form>
    </div>

    
    <div class="card p-6 border-red-100">
        <h2 class="text-sm font-semibold text-red-600 mb-2">Danger Zone</h2>
        <p class="text-xs text-slate-500 mb-4">Deleting your account permanently removes all contracts and data.</p>
        <button type="button"
                onclick="if(confirm('Are you absolutely sure? This CANNOT be undone.')) { document.getElementById('delete-form').submit() }"
                class="btn-danger btn-sm">
            Delete my account
        </button>
        <form id="delete-form" method="POST" action="<?php echo e(route('account.destroy')); ?>" class="hidden">
            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
        </form>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\contracts-app\contracts-app\resources\views/pages/account/settings.blade.php ENDPATH**/ ?>