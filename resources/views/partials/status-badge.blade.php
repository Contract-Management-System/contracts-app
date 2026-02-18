{{-- partials/status-badge.blade.php --}}
{{-- Usage: @include('partials.status-badge', ['status' => $contract->status]) --}}

@php
$map = [
    'active'   => ['class' => 'badge-active',   'label' => 'Active'],
    'expiring' => ['class' => 'badge-expiring',  'label' => 'Expiring'],
    'expired'  => ['class' => 'badge-expired',   'label' => 'Expired'],
    'draft'    => ['class' => 'badge-draft',     'label' => 'Draft'],
    'pending'  => ['class' => 'badge-pending',   'label' => 'Pending'],
];
$s = $map[$status] ?? ['class' => 'badge-draft', 'label' => ucfirst($status)];
@endphp

<span class="{{ $s['class'] }}">
    <span class="w-1 h-1 rounded-full inline-block
        @if($status === 'active') bg-green-500
        @elseif($status === 'expiring') bg-amber-500
        @elseif($status === 'expired') bg-red-500
        @elseif($status === 'pending') bg-blue-500
        @else bg-slate-400
        @endif">
    </span>
    {{ $s['label'] }}
</span>
