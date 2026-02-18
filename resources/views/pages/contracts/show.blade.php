@extends('layouts.app')

@section('title', $contract->title)
@section('page-title', $contract->title)
@section('page-breadcrumb', 'Contract details')

@section('content')

{{-- ── Header row ───────────────────────────────────────────────────── --}}
<div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-6">
    <div class="flex items-center gap-3">
        @include('partials.status-badge', ['status' => $contract->status])
        @if ($contract->type)
        <span class="text-xs text-slate-500 bg-slate-50 px-2.5 py-1 rounded-full border border-slate-100">
            {{ $contract->type }}
        </span>
        @endif
    </div>
    <div class="flex items-center gap-2">
        @if ($contract->file_path)
        <a href="{{ Storage::url($contract->file_path) }}" target="_blank" class="btn-secondary btn-sm">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Download
        </a>
        @endif
        <a href="{{ route('contracts.edit', $contract) }}" class="btn-primary btn-sm">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
            Edit
        </a>
        <form method="POST" action="{{ route('contracts.destroy', $contract) }}"
              onsubmit="return confirm('Permanently delete this contract?')">
            @csrf @method('DELETE')
            <button class="btn-ghost btn-sm text-red-500 hover:text-red-700 hover:bg-red-50">Delete</button>
        </form>
    </div>
</div>

{{-- ── Main grid ────────────────────────────────────────────────────── --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

    {{-- Details card --}}
    <div class="lg:col-span-2 card p-6 space-y-6">
        <div>
            <h1 class="text-xl font-display font-semibold text-slate-900 mb-1">
                {{ $contract->title }}
            </h1>
            @if ($contract->counterparty)
            <p class="text-sm text-slate-500">{{ $contract->counterparty }}</p>
            @endif
        </div>

        @if ($contract->description)
        <div>
            <p class="text-xxs font-semibold uppercase tracking-widest text-slate-400 mb-2">Description</p>
            <p class="text-sm text-slate-600 leading-relaxed">{{ $contract->description }}</p>
        </div>
        @endif

        {{-- Key dates --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 pt-4 border-t border-slate-100">
            @foreach([
                ['label' => 'Start Date',  'value' => $contract->start_date?->format('d M Y')],
                ['label' => 'End Date',    'value' => $contract->end_date?->format('d M Y')],
                ['label' => 'Reminder',    'value' => $contract->reminder_days ? $contract->reminder_days . ' days before' : null],
                ['label' => 'Value',       'value' => $contract->value ? number_format($contract->value, 2) . ' ' . $contract->currency : null],
                ['label' => 'Added by',    'value' => $contract->creator?->name],
                ['label' => 'Last updated','value' => $contract->updated_at->format('d M Y')],
            ] as $field)
            @if ($field['value'])
            <div>
                <p class="text-xxs font-semibold uppercase tracking-widest text-slate-400 mb-1">{{ $field['label'] }}</p>
                <p class="text-sm text-slate-700 font-mono">{{ $field['value'] }}</p>
            </div>
            @endif
            @endforeach
        </div>
    </div>

    {{-- Side panel --}}
    <div class="space-y-4">

        {{-- Expiry countdown --}}
        @if ($contract->end_date)
        <div class="card p-5
            {{ $contract->isExpired()       ? 'border-red-200   bg-red-50'   : '' }}
            {{ $contract->isExpiringSoon()  ? 'border-amber-200 bg-amber-50' : '' }}
        ">
            <p class="text-xxs font-semibold uppercase tracking-widest mb-2
                {{ $contract->isExpired() ? 'text-red-500' : ($contract->isExpiringSoon() ? 'text-amber-600' : 'text-slate-400') }}">
                @if ($contract->isExpired()) Expired
                @elseif ($contract->isExpiringSoon()) Expiring Soon
                @else Expires
                @endif
            </p>
            <p class="text-2xl font-display font-semibold
                {{ $contract->isExpired() ? 'text-red-700' : ($contract->isExpiringSoon() ? 'text-amber-700' : 'text-slate-900') }}">
                {{ $contract->end_date->format('d M Y') }}
            </p>
            <p class="text-xs mt-1
                {{ $contract->isExpired() ? 'text-red-500' : 'text-slate-400' }}">
                {{ $contract->end_date->diffForHumans() }}
            </p>
        </div>
        @endif

        {{-- Quick actions --}}
        <div class="card p-5">
            <p class="text-xxs font-semibold uppercase tracking-widest text-slate-400 mb-3">Quick Actions</p>
            <div class="space-y-2">
                <a href="{{ route('contracts.edit', $contract) }}" class="nav-item w-full text-xs">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit contract
                </a>
                <a href="{{ route('contracts.index') }}" class="nav-item w-full text-xs">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
                    </svg>
                    Back to all contracts
                </a>
            </div>
        </div>

    </div>
</div>

@endsection
