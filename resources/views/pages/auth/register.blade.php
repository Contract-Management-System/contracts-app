@extends('layouts.auth')

@section('title', 'Create account')

@section('content')

<div>
    <h1 class="text-2xl font-display font-semibold text-slate-900 mb-1">Create your account</h1>
    <p class="text-slate-400 text-sm mb-8">Free to start. No credit card needed.</p>

    <form action="{{ route('register') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label class="label" for="name">Full name</label>
            <input type="text" id="name" name="name"
                   class="input @error('name') input-error @enderror"
                   value="{{ old('name') }}"
                   placeholder="Jane Smith"
                   autocomplete="name" required autofocus>
            @error('name') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="label" for="email">Work email</label>
            <input type="email" id="email" name="email"
                   class="input @error('email') input-error @enderror"
                   value="{{ old('email') }}"
                   placeholder="jane@company.com"
                   autocomplete="email" required>
            @error('email') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="label" for="password">Password</label>
            <input type="password" id="password" name="password"
                   class="input @error('password') input-error @enderror"
                   placeholder="Min. 8 characters"
                   autocomplete="new-password" required>
            @error('password') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="label" for="password_confirmation">Confirm password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                   class="input"
                   placeholder="Repeat password"
                   autocomplete="new-password" required>
        </div>

        <button type="submit" class="btn-primary w-full justify-center">
            Create account
        </button>

        <p class="text-xs text-slate-400 text-center">
            By signing up you agree to our
            <a href="#" class="underline hover:text-slate-600">Terms</a> and
            <a href="#" class="underline hover:text-slate-600">Privacy Policy</a>.
        </p>

    </form>

    <p class="text-center text-sm text-slate-400 mt-8">
        Already have an account?
        <a href="{{ route('login') }}" class="text-ink-700 hover:text-ink-900 font-medium">Sign in →</a>
    </p>
</div>

@endsection
