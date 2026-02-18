<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Sign in') — ContractVault</title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen bg-slate-50 flex">

    {{-- Left panel — branding --}}
    <div class="hidden lg:flex lg:w-2/5 xl:w-1/3 bg-ink-900 flex-col justify-between p-12 relative overflow-hidden">
        {{-- Background texture --}}
        <div class="absolute inset-0 opacity-5"
             style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 24px 24px;"></div>

        <a href="{{ route('home') }}" class="relative flex items-center gap-2.5 text-white font-display text-xl font-semibold">
            @include('partials.logo', ['light' => true])
        </a>

        <div class="relative">
            <blockquote class="text-slate-300 text-lg font-display italic leading-relaxed mb-6">
                "The single source of truth for every agreement we've ever signed."
            </blockquote>
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-ink-700 flex items-center justify-center text-xs font-semibold text-white">KP</div>
                <div>
                    <p class="text-white text-sm font-medium">Kemi Pryce</p>
                    <p class="text-slate-500 text-xs">Legal Lead, Horizon Corp</p>
                </div>
            </div>
        </div>

        <p class="relative text-slate-600 text-xs">&copy; {{ date('Y') }} ContractVault</p>
    </div>

    {{-- Right panel — form --}}
    <div class="flex-1 flex flex-col justify-center px-6 py-12 sm:px-12 lg:px-20 xl:px-28">
        <div class="w-full max-w-md mx-auto">

            {{-- Mobile logo --}}
            <a href="{{ route('home') }}" class="lg:hidden flex items-center gap-2 mb-10">
                @include('partials.logo')
            </a>

            @include('partials.flash')

            @yield('content')
        </div>
    </div>

    @stack('scripts')
</body>
</html>
