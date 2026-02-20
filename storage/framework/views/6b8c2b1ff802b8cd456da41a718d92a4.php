

<?php $editing = isset($contract); ?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    
    <div class="lg:col-span-2 space-y-5">

        <div class="card p-6 space-y-5">
            <h2 class="text-sm font-semibold text-slate-700 pb-3 border-b border-slate-100">Contract Details</h2>

            
            <div>
                <label class="label" for="title">Contract Title *</label>
                <input type="text" id="title" name="title"
                       class="input <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       value="<?php echo e(old('title', $contract->title ?? '')); ?>"
                       placeholder="e.g. Annual SaaS Subscription — Acme Inc"
                       required>
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="field-error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div>
                <label class="label" for="counterparty">Counterparty / Vendor</label>
                <input type="text" id="counterparty" name="counterparty"
                       class="input <?php $__errorArgs = ['counterparty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       value="<?php echo e(old('counterparty', $contract->counterparty ?? '')); ?>"
                       placeholder="Company or individual name">
                <?php $__errorArgs = ['counterparty'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="field-error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div>
                <label class="label" for="description">Description / Notes</label>
                <textarea id="description" name="description" rows="4"
                          class="input resize-none"
                          placeholder="Brief summary of what this contract covers…"><?php echo e(old('description', $contract->description ?? '')); ?></textarea>
            </div>
        </div>

        
        <div class="card p-6 space-y-5">
            <h2 class="text-sm font-semibold text-slate-700 pb-3 border-b border-slate-100">Dates</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="label" for="start_date">Start Date</label>
                    <input type="date" id="start_date" name="start_date"
                           class="input <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           value="<?php echo e(old('start_date', ($contract ?? null)?->start_date?->format('Y-m-d') ?? '')); ?>">
                    <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="field-error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div>
                    <label class="label" for="end_date">
                        End / Expiry Date
                        <span class="text-slate-300 font-normal normal-case tracking-normal">(leave blank = no expiry)</span>
                    </label>
                    <input type="date" id="end_date" name="end_date"
                           class="input <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> input-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           value="<?php echo e(old('end_date', ($contract ?? null)?->end_date?->format('Y-m-d') ?? '')); ?>">
                    <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="field-error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            
            <div>
                <label class="label" for="reminder_days">Remind me (days before expiry)</label>
                <select id="reminder_days" name="reminder_days" class="input w-auto">
                    <?php $__currentLoopData = [7, 14, 30, 60, 90]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($d); ?>" <?php echo e(old('reminder_days', $contract->reminder_days ?? 30) == $d ? 'selected' : ''); ?>>
                        <?php echo e($d); ?> days before
                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

    </div>

    
    <div class="space-y-5">

        <div class="card p-6 space-y-5">
            <h2 class="text-sm font-semibold text-slate-700 pb-3 border-b border-slate-100">Classification</h2>

            
            <div>
                <label class="label" for="status">Status *</label>
                <select id="status" name="status" class="input" required>
                    <?php $__currentLoopData = ['draft','pending','active','expired']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($s); ?>" <?php echo e(old('status', $contract->status ?? 'draft') === $s ? 'selected' : ''); ?>>
                        <?php echo e(ucfirst($s)); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="field-error"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div>
                <label class="label" for="type">Contract Type</label>
                <select id="type" name="type" class="input">
                    <option value="">— Select —</option>
                    <?php $__currentLoopData = \App\Models\Contract::TYPES; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($t); ?>" <?php echo e(old('type', $contract->type ?? '') === $t ? 'selected' : ''); ?>>
                        <?php echo e($t); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            
            <div>
                <label class="label" for="value">Contract Value</label>
                <div class="flex gap-2">
                    <select name="currency" class="input w-24 shrink-0">
                        <?php $__currentLoopData = ['USD','EUR','GBP','UGX','KES']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($c); ?>" <?php echo e(old('currency', $contract->currency ?? 'USD') === $c ? 'selected' : ''); ?>><?php echo e($c); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <input type="number" id="value" name="value" min="0" step="0.01"
                           class="input flex-1"
                           value="<?php echo e(old('value', $contract->value ?? '')); ?>"
                           placeholder="0.00">
                </div>
            </div>
        </div>

        
        <div class="card p-6 space-y-4">
            <h2 class="text-sm font-semibold text-slate-700 pb-3 border-b border-slate-100">Document</h2>
            <div>
                <label class="label" for="file">Upload Contract (PDF/DOCX)</label>
                <input type="file" id="file" name="file"
                       accept=".pdf,.doc,.docx"
                       class="block w-full text-sm text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border file:border-slate-200 file:text-xs file:font-medium file:text-slate-700 hover:file:bg-slate-50 file:cursor-pointer cursor-pointer">
                <?php if($editing && $contract->file_path): ?>
                <p class="text-xs text-slate-400 mt-1.5">
                    Current: <a href="<?php echo e(Storage::url($contract->file_path)); ?>" target="_blank" class="text-ink-600 underline"><?php echo e(basename($contract->file_path)); ?></a>
                </p>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="flex gap-2">
            <button type="submit" class="btn-primary flex-1 justify-center">
                <?php echo e($editing ? 'Save changes' : 'Create contract'); ?>

            </button>
            <a href="<?php echo e(route('contracts.index')); ?>" class="btn-secondary">Cancel</a>
        </div>

    </div>
</div>
<?php /**PATH C:\xampp\htdocs\contracts-app\contracts-app\resources\views/pages/contracts/_form.blade.php ENDPATH**/ ?>