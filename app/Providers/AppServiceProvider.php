<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        View::composer('*', function ($view)
        {
            $categories = Category::where('status', 'active')->get(); // правильно ли???

            if (auth()->check()) {
                $cart = Cart::where('user_id', '=', auth()->user()->id)->first();
            }
            else {
                $cart = Cart::where('session', '=', request()->cookie('uuid'))->orderByDesc('updated_at')->first();
            }
            if (empty($cart) or $cart->products->count() <= 0) {
                $view->with(['categories' => $categories, 'cartProductsCount' => 0]);
            }

            $view->with(['categories' => $categories, 'cartProductsCount' => $cart->quantity]);
        });
    }
}
