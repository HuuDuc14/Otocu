<?php

namespace App\Providers;

use App\Models\User;
use Hash;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();
        if (!User::where('email', 'admin@gmail.com')->exists()) {
            User::create([
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'phone_number' => '0123456789',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ]);
        }
    }
}
