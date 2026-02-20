<?php $__env->startSection('title', 'Sign in'); ?>

<?php $__env->startSection('content'); ?>

<div>
    <h1 class="text-2xl font-display font-semibold text-slate-900 mb-1">Welcome back</h1>
    <p class="text-slate-400 text-sm mb-8">Sign in to your ContractVault account.</p>

    <form action="<?php echo e(route('login')); ?>" method="POST" class="space-y-5">
        <?php echo csrf_field(); ?>

        <div>
            <label class="label" for="email">Email address</label>
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
                   placeholder="you@company.com"
                   autocomplete="email" required autofocus>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="field-error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div>
            <div class="flex items-center justify-between mb-1.5">
                <label class="label mb-0" for="password">Password</label>
                
            </div>
            <input type="password" id="password" name="password"
                   class="input <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                   placeholder="••••••••"
                   autocomplete="current-password" required>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="field-error"><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" id="remember" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>

                   class="w-4 h-4 rounded border-slate-300 text-ink-600 focus:ring-ink-500">
            <label for="remember" class="text-sm text-slate-500">Keep me signed in</label>
        </div>

        <button type="submit" class="btn-primary w-full justify-center">
            Sign in
        </button>

    </form>

    <p class="text-center text-sm text-slate-400 mt-8">
        Don't have an account?
        <a href="<?php echo e(route('register')); ?>" class="text-ink-700 hover:text-ink-900 font-medium">
            Create one free →
        </a>
    </p>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\contracts-app\contracts-app\resources\views/pages/auth/login.blade.php ENDPATH**/ ?>