<?php

namespace App\Providers;

use App\Models\Contract;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        /**
         * Share the expiring-soon count with all views so the sidebar
         * badge always shows the correct number without per-controller work.
         */
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $view->with('expiringSoonCount',
                    Contract::forUser(Auth::id())->expiringSoon(30)->count()
                );
            }
        });
    }
}
