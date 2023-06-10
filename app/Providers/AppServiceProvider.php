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

//            try {
//                if (auth()->check()) {
//                    $cart = Cart::where('user_id', '=', auth()->user()->id)->firstOrfail();
//                }
//                else {
//                    $cart = Cart::where('session', '=', request()->cookie('uuid'))->orderByDesc('updated_at')->firstOrfail();
//                }
//                if ($cart->products->count() <= 0) {
//                    throw new Exception();
//                }
//            }
//            catch (Exception $exception) {
//                $view->with(['categories' => $categories, 'cartProductsCount' => null]);
//            }
//
//            dump($cart);

            $view->with('categories', $categories);
//            $view->with(['categories' => $categories, 'cartProductsCount' => $cart->quantity]);
        });
    }
}
