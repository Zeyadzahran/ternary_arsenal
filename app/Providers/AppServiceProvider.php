<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Services\CurrencyService;
use SimpleSoftwareIO\QrCode\Generator;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\GdImageBackEnd;
use Illuminate\Support\Facades\Cache;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;




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
        $categories = cache()->remember('shared_categories', 60 * 60, function () {
            return Category::all();
        });
        View::share('categories', $categories);

      
    }
}
