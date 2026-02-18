<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — ContractVault
|--------------------------------------------------------------------------
|
| HOW TO ADD A NEW PAGE:
|   1. Add a route below in the appropriate group
|   2. Add/update a controller method
|   3. Create the Blade view
|   4. If it's a dashboard page, add it to partials/sidebar.blade.php
|
| HOW TO REMOVE A PAGE:
|   1. Comment out or delete the route
|   2. Remove from sidebar.blade.php
|
*/

// ══════════════════════════════════════════════════════════════════
// PUBLIC
// ══════════════════════════════════════════════════════════════════

Route::get('/', [PageController::class, 'home'])->name('home');


// ══════════════════════════════════════════════════════════════════
// AUTH  (guests only)
// ══════════════════════════════════════════════════════════════════

Route::middleware('guest')->group(function () {
    Route::get( '/login',    [AuthController::class, 'showLogin']   )->name('login');
    Route::post('/login',    [AuthController::class, 'login']       );
    Route::get( '/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']    );
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


// ══════════════════════════════════════════════════════════════════
// AUTHENTICATED AREA
// ══════════════════════════════════════════════════════════════════

Route::middleware('auth')->group(function () {

    // ── Dashboard ─────────────────────────────────────────────────
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // ── Contracts (full CRUD + extra views) ───────────────────────
    Route::prefix('contracts')->name('contracts.')->group(function () {
        Route::get('/',           [ContractController::class, 'index']   )->name('index');
        Route::get('/expiring',   [ContractController::class, 'expiring'])->name('expiring');
        Route::get('/drafts',     [ContractController::class, 'drafts']  )->name('drafts');
        Route::get('/create',     [ContractController::class, 'create']  )->name('create');
        Route::post('/',          [ContractController::class, 'store']   )->name('store');
        Route::get('/{contract}', [ContractController::class, 'show']    )->name('show');
        Route::get('/{contract}/edit', [ContractController::class, 'edit'])->name('edit');
        Route::put('/{contract}', [ContractController::class, 'update']  )->name('update');
        Route::delete('/{contract}', [ContractController::class, 'destroy'])->name('destroy');
    });

    // ── Account settings ──────────────────────────────────────────
    Route::prefix('account')->name('account.')->group(function () {
        Route::get('/settings',  [AccountController::class, 'settings']      )->name('settings');
        Route::put('/profile',   [AccountController::class, 'update']        )->name('update');
        Route::put('/password',  [AccountController::class, 'updatePassword'])->name('password');
        Route::delete('/delete', [AccountController::class, 'destroy']       )->name('destroy');
    });

});
