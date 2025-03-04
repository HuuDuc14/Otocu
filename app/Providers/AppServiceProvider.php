<?php

namespace App\Providers;

use App\Models\Appointment;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use View;

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

        View::composer('partials.navbar', function ($view) {
            $appointments = Appointment::where('id_seller', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
            $view->with('appointments', $appointments);
        });

    }
}
