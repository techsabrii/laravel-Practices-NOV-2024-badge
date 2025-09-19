<?php

namespace App\Providers;

use App\Models\User;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {

        Paginator::useBootstrapFive();
        Gate::define('Admin', function (User $user) {
            return $user->role === 'admin';
        });
    }
}
