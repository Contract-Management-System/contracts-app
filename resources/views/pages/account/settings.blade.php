@extends('layouts.app')

@section('title', 'Account Settings')
@section('page-title', 'Account Settings')

@section('content')

<div class="max-w-xl space-y-5">

    {{-- Profile --}}
    <div class="card p-6">
        <h2 class="text-sm font-semibold text-slate-900 mb-5 pb-3 border-b border-slate-100">Profile</h2>
        <form action="{{ route('account.update') }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="label" for="name">Full name</label>
                <input type="text" id="name" name="name" class="input"
                       value="{{ auth()->user()->name }}">
                @error('name') <p class="field-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="label" for="email">Email address</label>
                <input type="email" id="email" name="email" class="input"
                       value="{{ auth()->user()->email }}">
                @error('email') <p class="field-error">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="btn-primary">Save changes</button>
        </form>
    </div>

    {{-- Password --}}
    <div class="card p-6">
        <h2 class="text-sm font-semibold text-slate-900 mb-5 pb-3 border-b border-slate-100">Change Password</h2>
        <form action="{{ route('account.password') }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="label" for="current_password">Current password</label>
                <input type="password" id="current_password" name="current_password" class="input" placeholder="••••••••">
                @error('current_password') <p class="field-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="label" for="password">New password</label>
                <input type="password" id="password" name="password" class="input" placeholder="Min. 8 characters">
                @error('password') <p class="field-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="label" for="password_confirmation">Confirm new password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="input" placeholder="Repeat new password">
            </div>
            <button type="submit" class="btn-primary">Update password</button>
        </form>
    </div>

    {{-- Danger zone --}}
    <div class="card p-6 border-red-100">
        <h2 class="text-sm font-semibold text-red-600 mb-2">Danger Zone</h2>
        <p class="text-xs text-slate-500 mb-4">Deleting your account permanently removes all contracts and data.</p>
        <button type="button"
                onclick="if(confirm('Are you absolutely sure? This CANNOT be undone.')) { document.getElementById('delete-form').submit() }"
                class="btn-danger btn-sm">
            Delete my account
        </button>
        <form id="delete-form" method="POST" action="{{ route('account.destroy') }}" class="hidden">
            @csrf @method('DELETE')
        </form>
    </div>

</div>

@endsection
