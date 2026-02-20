<?php $__env->startSection('title', 'Create account'); ?>

<?php $__env->startSection('content'); ?>

<div>
    <h1 class="text-2xl font-display font-semibold text-slate-900 mb-1">Create your account</h1>
    <p class="text-slate-400 text-sm mb-8">Free to start. No credit card needed.</p>

    <form action="<?php echo e(route('register')); ?>" method="POST" class="space-y-5">
        <?php echo csrf_field(); ?>

        <div>
            <label class="label" for="name">Full name</label>
            <input type="text" id="name" name="name"
                   class="input <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   value="<?php echo e(old('name')); ?>"
                   placeholder="Jane Smith"
                   autocomplete="name" required autofocus>
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
            <label class="label" for="email">Work email</label>
            <input type="email" id="email" name="email"
                   class="input <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   value="<?php echo e(old('email')); ?>"
                   placeholder="jane@company.com"
                   autocomplete="email" required>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="field-error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <label class="label" for="password">Password</label>
            <input type="password" id="password" name="password"
                   class="input <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   placeholder="Min. 8 characters"
                   autocomplete="new-password" required>
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
            <label class="label" for="password_confirmation">Confirm password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                   class="input"
                   placeholder="Repeat password"
                   autocomplete="new-password" required>
        </div>

        <button type="submit" class="btn-primary w-full justify-center">
            Create account
        </button>

        <p class="text-xs text-slate-400 text-center">
            By signing up you agree to our
            <a href="#" class="underline hover:text-slate-600">Terms</a> and
            <a href="#" class="underline hover:text-slate-600">Privacy Policy</a>.
        </p>

    </form>

    <p class="text-center text-sm text-slate-400 mt-8">
        Already have an account?
        <a href="<?php echo e(route('login')); ?>" class="text-ink-700 hover:text-ink-900 font-medium">Sign in →</a>
    </p>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\contracts-app\contracts-app\resources\views/pages/auth/register.blade.php ENDPATH**/ ?>