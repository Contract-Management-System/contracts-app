@extends('layouts.auth')

@section('title', 'Sign in')

@section('content')

<div>
    <h1 class="text-2xl font-display font-semibold text-slate-900 mb-1">Welcome back</h1>
    <p class="text-slate-400 text-sm mb-8">Sign in to your ContractVault account.</p>

    <form action="{{ route('login') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="label" for="email">Email address</label>
            <input type="email" id="email" name="email"
                   class="input @error('email') input-error @enderror"
                   value="{{ old('email') }}"
                   placeholder="you@company.com"
                   autocomplete="email" required autofocus>
            @error('email')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <div class="flex items-center justify-between mb-1.5">
                <label class="label mb-0" for="password">Password</label>
                {{-- <a href="#" class="text-xs text-ink-600 hover:text-ink-800">Forgot?</a> --}}
            </div>
            <input type="password" id="password" name="password"
                   class="input @error('password') input-error @enderror"
                   placeholder="••••••••"
                   autocomplete="current-password" required>
            @error('password')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}
                   class="w-4 h-4 rounded border-slate-300 text-ink-600 focus:ring-ink-500">
            <label for="remember" class="text-sm text-slate-500">Keep me signed in</label>
        </div>

        <button type="submit" class="btn-primary w-full justify-center">
            Sign in
        </button>

    </form>

    <p class="text-center text-sm text-slate-400 mt-8">
        Don't have an account?
        <a href="{{ route('register') }}" class="text-ink-700 hover:text-ink-900 font-medium">
            Create one free →
        </a>
    </p>
</div>

@endsection
