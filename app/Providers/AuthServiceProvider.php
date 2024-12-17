<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Gate::define('access-admin-panel', function (User $user) {
            // Pastikan hanya user dengan role admin yang bisa 
            return $user->hasRole('admin');
        });
    }
}