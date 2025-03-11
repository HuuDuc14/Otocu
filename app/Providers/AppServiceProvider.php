<?php

namespace App\Providers;

use App\Models\Appointment;
use App\Models\User;
use Auth;
use Carbon\Carbon;
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
        Carbon::setLocale('vi');

        View::composer('partials-new.header', function ($view) {
            $appointments = Appointment::where('id_seller', Auth::id())
            ->where('status', false)
            ->orderBy('created_at', 'desc')
            ->get();
            $view->with('appointments', $appointments);
        });

    }
}
