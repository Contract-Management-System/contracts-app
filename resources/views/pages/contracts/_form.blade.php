{{--
    PARTIAL: pages/contracts/_form.blade.php
    ─────────────────────────────────────────
    Shared between create.blade.php and edit.blade.php.
    Pass $contract for edit mode (pre-fills fields).
    Expects the parent form tag with action/method.
--}}

@php $editing = isset($contract); @endphp

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- ── Left: main fields ──────────────────────────────────────── --}}
    <div class="lg:col-span-2 space-y-5">

        <div class="card p-6 space-y-5">
            <h2 class="text-sm font-semibold text-slate-700 pb-3 border-b border-slate-100">Contract Details</h2>

            {{-- Title --}}
            <div>
                <label class="label" for="title">Contract Title *</label>
                <input type="text" id="title" name="title"
                       class="input @error('title') input-error @enderror"
                       value="{{ old('title', $contract->title ?? '') }}"
                       placeholder="e.g. Annual SaaS Subscription — Acme Inc"
                       required>
                @error('title') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            {{-- Counterparty --}}
            <div>
                <label class="label" for="counterparty">Counterparty / Vendor</label>
                <input type="text" id="counterparty" name="counterparty"
                       class="input @error('counterparty') input-error @enderror"
                       value="{{ old('counterparty', $contract->counterparty ?? '') }}"
                       placeholder="Company or individual name">
                @error('counterparty') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            {{-- Description --}}
            <div>
                <label class="label" for="description">Description / Notes</label>
                <textarea id="description" name="description" rows="4"
                          class="input resize-none"
                          placeholder="Brief summary of what this contract covers…">{{ old('description', $contract->description ?? '') }}</textarea>
            </div>
        </div>

        {{-- Dates --}}
        <div class="card p-6 space-y-5">
            <h2 class="text-sm font-semibold text-slate-700 pb-3 border-b border-slate-100">Dates</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="label" for="start_date">Start Date</label>
                    <input type="date" id="start_date" name="start_date"
                           class="input @error('start_date') input-error @enderror"
                           value="{{ old('start_date', $contract->start_date?->format('Y-m-d') ?? '') }}">
                    @error('start_date') <p class="field-error">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="label" for="end_date">
                        End / Expiry Date
                        <span class="text-slate-300 font-normal normal-case tracking-normal">(leave blank = no expiry)</span>
                    </label>
                    <input type="date" id="end_date" name="end_date"
                           class="input @error('end_date') input-error @enderror"
                           value="{{ old('end_date', $contract->end_date?->format('Y-m-d') ?? '') }}">
                    @error('end_date') <p class="field-error">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Reminder days --}}
            <div>
                <label class="label" for="reminder_days">Remind me (days before expiry)</label>
                <select id="reminder_days" name="reminder_days" class="input w-auto">
                    @foreach ([7, 14, 30, 60, 90] as $d)
                    <option value="{{ $d }}" {{ old('reminder_days', $contract->reminder_days ?? 30) == $d ? 'selected' : '' }}>
                        {{ $d }} days before
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

    </div>

    {{-- ── Right: metadata ────────────────────────────────────────── --}}
    <div class="space-y-5">

        <div class="card p-6 space-y-5">
            <h2 class="text-sm font-semibold text-slate-700 pb-3 border-b border-slate-100">Classification</h2>

            {{-- Status --}}
            <div>
                <label class="label" for="status">Status *</label>
                <select id="status" name="status" class="input" required>
                    @foreach (['draft','pending','active','expired'] as $s)
                    <option value="{{ $s }}" {{ old('status', $contract->status ?? 'draft') === $s ? 'selected' : '' }}>
                        {{ ucfirst($s) }}
                    </option>
                    @endforeach
                </select>
                @error('status') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            {{-- Type --}}
            <div>
                <label class="label" for="type">Contract Type</label>
                <select id="type" name="type" class="input">
                    <option value="">— Select —</option>
                    @foreach (\App\Models\Contract::TYPES as $t)
                    <option value="{{ $t }}" {{ old('type', $contract->type ?? '') === $t ? 'selected' : '' }}>
                        {{ $t }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Value --}}
            <div>
                <label class="label" for="value">Contract Value</label>
                <div class="flex gap-2">
                    <select name="currency" class="input w-24 shrink-0">
                        @foreach (['USD','EUR','GBP','UGX','KES'] as $c)
                        <option value="{{ $c }}" {{ old('currency', $contract->currency ?? 'USD') === $c ? 'selected' : '' }}>{{ $c }}</option>
                        @endforeach
                    </select>
                    <input type="number" id="value" name="value" min="0" step="0.01"
                           class="input flex-1"
                           value="{{ old('value', $contract->value ?? '') }}"
                           placeholder="0.00">
                </div>
            </div>
        </div>

        {{-- File upload --}}
        <div class="card p-6 space-y-4">
            <h2 class="text-sm font-semibold text-slate-700 pb-3 border-b border-slate-100">Document</h2>
            <div>
                <label class="label" for="file">Upload Contract (PDF/DOCX)</label>
                <input type="file" id="file" name="file"
                       accept=".pdf,.doc,.docx"
                       class="block w-full text-sm text-slate-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border file:border-slate-200 file:text-xs file:font-medium file:text-slate-700 hover:file:bg-slate-50 file:cursor-pointer cursor-pointer">
                @if ($editing && $contract->file_path)
                <p class="text-xs text-slate-400 mt-1.5">
                    Current: <a href="{{ Storage::url($contract->file_path) }}" target="_blank" class="text-ink-600 underline">{{ basename($contract->file_path) }}</a>
                </p>
                @endif
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex gap-2">
            <button type="submit" class="btn-primary flex-1 justify-center">
                {{ $editing ? 'Save changes' : 'Create contract' }}
            </button>
            <a href="{{ route('contracts.index') }}" class="btn-secondary">Cancel</a>
        </div>

    </div>
</div>
