<?php

namespace App\Http\Middleware;

use App\Models\Cart;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class Session
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        $request->session()->forget('session_id');
        dump(session()->all());


        $tests = Cart::find(58);

        foreach ($tests->products as $product) {
            dump($product->pivot->quantity);
        }

        $cart = Cart::where('user_id', '=', auth()->user()->id)->firstOrfail();
        $cart_product = $cart->products()->where('product_id', '=', 3)->first();


        if (empty($cart_product)) {
            $cart->products()->attach(3, ['quantity' => 1]);
        }
        else {
            $cart->products()->updateExistingPivot($product, array('quantity' => $cart_product->pivot->quantity + 1));
        }

        if (empty(session()->has('session_id'))) {
            session(['session_id' => Str::uuid()]);
        }
        Cart::updateOrCreate(['session' => session('session_id')]);

        return $next($request);
    }
}
