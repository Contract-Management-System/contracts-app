<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ContractVault') — ContractVault</title>
    <meta name="description" content="@yield('meta_description', 'Track, manage, and never miss a contract deadline.')">
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="bg-white text-slate-800 min-h-screen flex flex-col">

    {{-- Topnav --}}
    @include('partials.public-nav')

    {{-- Flash --}}
    @include('partials.flash')

    {{-- Content --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.public-footer')

    @stack('scripts')
</body>
</html>
