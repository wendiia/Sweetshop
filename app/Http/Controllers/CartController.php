<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (auth()->check()) {
            $cart = Cart::where('user_id', '=', auth()->user()->id)->first();
        }
        else {
            $cart = Cart::where('session', '=', $request->cookie('uuid'))->orderByDesc('updated_at')->first();
        }

        if ($cart->products->count() > 0) {
            return view('main.cart', [
                'products' => $cart->products,
                'cart' => $cart,
            ]);
        }

        return view('main.cart')->with('emptyCart', ' К сожалению, ваша корзина пуста, но вы можете это исправить!');
    }
//    public function addToCart(Request $request, $product_id)
    public function addToCart(Request $request)
    {
        $session = $request->cookie('uuid');
//        $quantity = $request->input('quantity') ?? 1;
        $quantity = $request->quantity;
        $product_id = $request->product_id;

        if (auth()->check()) {
            $cart = Cart::where('user_id', '=', auth()->user()->id)->first();
        }
        else {
            $cart = Cart::where('session', '=', $session)->orderByDesc('updated_at')->first();
        }

        if (empty($cart)) {
            $cart = Cart::create(['session' => $session]);
        } else {
            $cart->touch();
        }
        if ($cart->products->contains($product_id)) {
            // если такой товар есть в корзине — изменяем кол-во
            $pivotRow = $cart->products()->where('product_id', $product_id)->first()->pivot;
            $quantity = $pivotRow->quantity + $quantity;
            $pivotRow->update(['quantity' => $quantity]);
        } else {
            // если такого товара нет в корзине — добавляем его
            $cart->products()->attach($product_id, ['quantity' => $quantity]);
        }

        // обновляем общее количество добавленных товароы в корзину
        $cart->quantity = $cart->products()->sum('quantity');
        $cart->amount = $cart->products()->sum(DB::raw('quantity * price'));
        $cart->save();

        // выполняем редирект обратно на страницу, где была нажата кнопка «В корзину»
//        return back();
        return response()->json();
//        return response()->json(['product_id' => $request->product_id, 'quantity' => $request->quantity]);
    }

    public function deleteAllCart(Request $request)
    {
        if (auth()->check()) {
            $cart = Cart::where('user_id', '=', auth()->user()->id)->first();
        }
        else {
            $cart = Cart::where('session', '=', $request->cookie('uuid'))->orderByDesc('updated_at')->first();
        }
        $cart->products()->detach();
        return response()->json();
    }

    public function deleteProduct(Request $request)
    {
        if (auth()->check()) {
            $cart = Cart::where('user_id', '=', auth()->user()->id)->first();
        }
        else {
            $cart = Cart::where('session', '=', $request->cookie('uuid'))->orderByDesc('updated_at')->first();
        }
        $cart->products()->detach($request->product_id);
        return response()->json();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

}
