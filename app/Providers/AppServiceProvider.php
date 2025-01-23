<?php

namespace App\Providers;

use App\Models\User;
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

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('post-todo', function (User $user) {
            return $user->role_id == 3;
        });

        Gate::define('edit-todo', function (User $user) {
            return $user->role_id == 2;
        });

        Gate::define('delete-todo', function (User $user) {
            return $user->role_id == 1;
        });
    }
}
