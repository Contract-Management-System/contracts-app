{{-- partials/logo.blade.php --}}
{{-- @include('partials.logo') or @include('partials.logo', ['light' => true]) --}}
@php $light = $light ?? false; @endphp

<svg class="w-7 h-7 shrink-0" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect width="28" height="28" rx="7" fill="{{ $light ? '#3d5af9' : '#1e2788' }}"/>
    <rect x="7" y="8" width="14" height="2" rx="1" fill="white"/>
    <rect x="7" y="12" width="10" height="2" rx="1" fill="white" opacity="0.7"/>
    <rect x="7" y="16" width="12" height="2" rx="1" fill="white" opacity="0.7"/>
    <circle cx="20" cy="19" r="4" fill="{{ $light ? '#f97316' : '#f97316' }}"/>
    <path d="M18.5 19L19.5 20L21.5 18" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

<span class="{{ $light ? 'text-white' : 'text-ink-900' }} font-display font-semibold text-lg tracking-tight">
    ContractVault
</span>
