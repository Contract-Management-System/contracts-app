@extends('layouts.app')

@section('title', 'Expiring Soon')
@section('page-title', 'Expiring Soon')
@section('page-breadcrumb', 'Contracts expiring in the next 90 days')

@section('content')

@if ($contracts->count())

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($contracts as $contract)
    <a href="{{ route('contracts.show', $contract) }}"
       class="card-interactive p-5 flex flex-col gap-3">

        <div class="flex items-start justify-between gap-2">
            <div class="flex-1 min-w-0">
                <p class="font-semibold text-slate-900 truncate">{{ $contract->title }}</p>
                @if ($contract->counterparty)
                <p class="text-xs text-slate-400 mt-0.5">{{ $contract->counterparty }}</p>
                @endif
            </div>
            @include('partials.status-badge', ['status' => $contract->status])
        </div>

        {{-- Expiry progress bar --}}
        @php
            $total    = $contract->start_date ? $contract->start_date->diffInDays($contract->end_date) : 365;
            $elapsed  = $contract->start_date ? $contract->start_date->diffInDays(now()) : 0;
            $progress = $total > 0 ? min(100, round(($elapsed / $total) * 100)) : 100;
            $daysLeft = now()->diffInDays($contract->end_date);
        @endphp

        <div>
            <div class="flex justify-between items-center mb-1">
                <span class="text-xxs text-slate-400 uppercase tracking-wider">Time elapsed</span>
                <span class="text-xs font-semibold
                    {{ $daysLeft <= 14 ? 'text-red-600' : ($daysLeft <= 30 ? 'text-amber-600' : 'text-slate-600') }}">
                    {{ $daysLeft }}d left
                </span>
            </div>
            <div class="h-1.5 w-full bg-slate-100 rounded-full overflow-hidden">
                <div class="h-full rounded-full transition-all
                    {{ $daysLeft <= 14 ? 'bg-red-400' : ($daysLeft <= 30 ? 'bg-amber-400' : 'bg-ink-400') }}"
                     style="width: {{ $progress }}%"></div>
            </div>
        </div>

        <p class="text-xs text-slate-500 flex items-center gap-1">
            <svg class="w-3 h-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            Expires {{ $contract->end_date->format('d M Y') }}
        </p>

    </a>
    @endforeach
</div>

@else
<div class="empty-state">
    <div class="text-5xl mb-4">🎉</div>
    <p class="text-sm font-medium text-slate-600 mb-1">No contracts expiring soon</p>
    <p class="text-xs text-slate-400">You're all clear for the next 90 days.</p>
</div>
@endif

@endsection
