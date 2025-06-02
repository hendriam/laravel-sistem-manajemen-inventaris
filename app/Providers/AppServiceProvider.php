<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useTailwind();
        
        // Custom Blade directive: @hasPermission
        Blade::if('hasPermission', function ($permission) {
            return Auth::check() && Auth::user()->hasPermission($permission);
        });

        Blade::if('hasAnyPermission', function (array $permissions) {
            $user = Auth::user();

            if (!$user || !$user->role) return false;

            return $user->role->permissions()
                ->whereIn('name', $permissions)
                ->exists();
        });

    }
}
