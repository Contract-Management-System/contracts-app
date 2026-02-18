<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — ContractVault</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="bg-slate-50 min-h-screen" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

        {{-- ── Sidebar overlay (mobile) ─────────────────────────────── --}}
        <div x-show="sidebarOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="sidebarOpen = false"
             class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-20 lg:hidden">
        </div>

        {{-- ── Sidebar ──────────────────────────────────────────────── --}}
        @include('partials.sidebar')

        {{-- ── Main Panel ───────────────────────────────────────────── --}}
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">

            {{-- Topbar --}}
            @include('partials.topbar')

            {{-- Flash messages --}}
            <div class="px-6 pt-4 shrink-0">
                @include('partials.flash')
            </div>

            {{-- Page content --}}
            <main class="flex-1 overflow-y-auto px-6 py-6">
                @yield('content')
            </main>
        </div>

    </div>

    @stack('scripts')
</body>
</html>
