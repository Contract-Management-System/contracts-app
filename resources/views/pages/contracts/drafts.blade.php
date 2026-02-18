@extends('layouts.app')

@section('title', 'Drafts')
@section('page-title', 'Drafts')
@section('page-breadcrumb', 'Contracts not yet published')

@section('content')

@if ($contracts->count())
<div class="card">
    <table class="table-base">
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Created</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contracts as $contract)
            <tr>
                <td>
                    <a href="{{ route('contracts.show', $contract) }}" class="font-medium text-slate-900 hover:text-ink-700 transition-colors">
                        {{ $contract->title }}
                    </a>
                    @if ($contract->counterparty)
                    <p class="text-xs text-slate-400">{{ $contract->counterparty }}</p>
                    @endif
                </td>
                <td class="text-xs text-slate-500">{{ $contract->type ?? '—' }}</td>
                <td class="text-xs text-slate-400 font-mono">{{ $contract->created_at->format('d M Y') }}</td>
                <td>
                    <div class="flex justify-end gap-1">
                        <a href="{{ route('contracts.edit', $contract) }}" class="btn-secondary btn-sm">Edit</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="px-5 py-4 border-t border-slate-100">
        {{ $contracts->links() }}
    </div>
</div>
@else
<div class="empty-state">
    <p class="text-sm font-medium text-slate-500">No drafts</p>
    <a href="{{ route('contracts.create') }}" class="btn-primary btn-sm mt-4">Create a contract</a>
</div>
@endif

@endsection
