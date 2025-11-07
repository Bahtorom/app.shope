<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchase;
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
        if (! app()->runningInConsole()) {
        View::composer('layout.app', function ($view) {
            $cartCount = 0;

            if (Auth::check()) {
                $cartCount = Purchase::where('user_id', Auth::id())
                    ->where('status', 'cart')
                    ->count();
            }

            $view->with('cartCount', $cartCount);
        });
    }
    }
}
