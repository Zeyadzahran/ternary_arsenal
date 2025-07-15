<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Services\CurrencyService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind CurrencyService as a singleton
        $this->app->singleton(CurrencyService::class, function ($app) {
            return new CurrencyService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share categories and cart count with all views
        View::composer('*', function ($view) {
            $view->with('categories', Category::all());

            $cart = Session::get('cart', []);
            $totalItemsInCart = array_sum(array_column($cart, 'quantity'));

            $view->with('cartCount', $totalItemsInCart);
        });
    }
}
