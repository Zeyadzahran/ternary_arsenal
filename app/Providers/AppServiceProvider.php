<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Illuminate\Support\Facades\Session;


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
        // this will make in view acsses this var 

        View::composer('*', function ($view) {
            $view->with('categories', Category::all());
                $cart = Session::get('cart', []);
                $totalItemsInCart = array_sum(array_column($cart, 'quantity'));
                $view->with('cartCount', $totalItemsInCart);
                    });
    }
}
