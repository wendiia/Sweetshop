<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

//        Здесь остановилась

//        $cart = Cart::where('session', '=', $request->cookie('uuid'))->first();


//        dd($cart->products->count());

//        if ($cart->products->count() > 0) {
//            $products = Cart::findOrFail($cart_id)->products;
//            return view('main.cart', compact('products'));
//        } else {
//            abort(404);
//        }

//        return view('main.cart');
    }

    public function addToCart(Request $request, $id)
    {
        $session = $request->cookie('uuid');
        $cart = Cart::where('session', '=', $session)->first();
        $quantity = $request->input('quantity') ?? 1;
        if (empty($cart)) {
            $cart = Cart::create(['session' => $session]);
        }
        else {
            $cart->touch();
        }
        if ($cart->products->contains($id)) {
            // если такой товар есть в корзине — изменяем кол-во
            $pivotRow = $cart->products()->where('product_id', $id)->first()->pivot;
            $quantity = $pivotRow->quantity + $quantity;
            $pivotRow->update(['quantity' => $quantity]);
        }
        else {
            // если такого товара нет в корзине — добавляем его
            $cart->products()->attach($id, ['quantity' => $quantity]);
        }
        // выполняем редирект обратно на страницу, где была нажата кнопка «В корзину»
        return back();


//        $cart_id = $request->cookie('cart_id');
//        $quantity = $request->input('quantity') ?? 1;
//        if (empty($cart_id)) {
//            // если корзина еще не существует — создаем объект
//            $cart = Cart::create();
//            // получаем идентификатор, чтобы записать в cookie
//            $cart_id = $cart->id;
//        }
//        else {
//            // корзина уже существует, получаем объект корзины
//            $cart = Cart::findOrFail($cart_id);
//            // обновляем поле `updated_at` таблицы `baskets`
//            $cart->touch();
//        }
//        if ($cart->products->contains($id)) {
//            // если такой товар есть в корзине — изменяем кол-во
//            $pivotRow = $cart->products()->where('product_id', $id)->first()->pivot;
//            $quantity = $pivotRow->quantity + $quantity;
//            $pivotRow->update(['quantity' => $quantity]);
//        }
//        else {
//            // если такого товара нет в корзине — добавляем его
//            $cart->products()->attach($id, ['quantity' => $quantity]);
//        }
//        // выполняем редирект обратно на страницу, где была нажата кнопка «В корзину»
//        return back()->withCookie(cookie('cart_id', $cart_id, 525600));
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
