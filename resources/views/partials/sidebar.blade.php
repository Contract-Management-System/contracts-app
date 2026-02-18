{{-- partials/sidebar.blade.php --}}
{{--
    To add a nav item: add to $navItems array.
    To add a section divider: add ['divider' => true, 'label' => 'Section Name'].
--}}

@php
$navItems = [
    [
        'label' => 'Dashboard',
        'route' => 'dashboard',
        'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>',
    ],
    ['divider' => true, 'label' => 'Contracts'],
    [
        'label' => 'All Contracts',
        'route' => 'contracts.index',
        'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>',
    ],
    [
        'label' => 'Expiring Soon',
        'route' => 'contracts.expiring',
        'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>',
        'badge' => $expiringSoonCount ?? 0,
    ],
    [
        'label' => 'Drafts',
        'route' => 'contracts.drafts',
        'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>',
    ],
    ['divider' => true, 'label' => 'Settings'],
    [
        'label' => 'Account',
        'route' => 'account.settings',
        'icon'  => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>',
    ],
];
@endphp

<aside
    class="
        fixed inset-y-0 left-0 z-30 w-60 bg-white border-r border-slate-200 flex flex-col
        transform transition-transform duration-200 ease-out
        lg:relative lg:translate-x-0
    "
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
>
    {{-- Brand --}}
    <div class="h-16 flex items-center px-4 border-b border-slate-100 shrink-0">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
            @include('partials.logo')
        </a>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-0.5">
        @foreach ($navItems as $item)
            @if (isset($item['divider']))
                <div class="pt-4 pb-1 px-3">
                    <p class="text-xxs font-semibold uppercase tracking-widest text-slate-300">{{ $item['label'] }}</p>
                </div>
            @else
                <a href="{{ route($item['route']) }}"
                   class="nav-item {{ request()->routeIs($item['route']) ? 'nav-item-active' : '' }}">
                    <svg class="w-4.5 h-4.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $item['icon'] !!}
                    </svg>
                    <span class="flex-1">{{ $item['label'] }}</span>
                    @if (!empty($item['badge']) && $item['badge'] > 0)
                        <span class="ml-auto px-1.5 py-0.5 text-xxs font-semibold bg-amber-100 text-amber-700 rounded-full">
                            {{ $item['badge'] }}
                        </span>
                    @endif
                </a>
            @endif
        @endforeach
    </nav>

    {{-- User footer --}}
    @auth
    <div class="shrink-0 border-t border-slate-100 p-3">
        <div class="flex items-center gap-3 px-2 py-2">
            <div class="w-7 h-7 rounded-full bg-ink-700 text-white text-xs font-semibold flex items-center justify-center shrink-0">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-xs font-semibold text-slate-800 truncate">{{ auth()->user()->name }}</p>
                <p class="text-xxs text-slate-400 truncate">{{ auth()->user()->email }}</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-slate-400 hover:text-slate-600 transition-colors" title="Sign out">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </button>
            </form>
        </div>
    </div>
    @endauth
</aside>
