<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $cart = $this->currentCart($request->cookie('uuid'));
            if ($cart->products->count() <= 0) {
                throw new Exception();
            }
        }
        catch (Exception $exception) {
            return view('main.cart')->with('emptyCart', ' К сожалению, ваша корзина пуста, но вы можете это исправить!');
        }

        return view('main.cart', compact('cart'));
    }

    /**
     * Add product to cart.
     */
    public function addToCart(Request $request)
    {
        $session = $request->cookie('uuid');

        try {
            $cart = $this->currentCart($request->cookie('uuid'));
            $cart->touch();
        }
        catch (ModelNotFoundException $exception) {
            $cart = Cart::create(['session' => $session]);
        }

        if ($cart->products->contains($request->product_id)) {
            // если такой товар есть в корзине — изменяем кол-во
            $pivotRow = $cart->products()->where('product_id', $request->product_id)->first()->pivot;
            $quantity = $pivotRow->quantity + $request->quantity;

            $pivotRow->update(['quantity' => $quantity]);
        } else {
            // если такого товара нет в корзине — добавляем его
            $cart->products()->attach($request->product_id, ['quantity' => $request->quantity]);
        }

        $this->updateData($cart); // обновляем данные

        return response()->json();
    }

    /**
     * Delete all products in cart.
     */
    public function deleteAllCart(Request $request)
    {
        $cart = $this->currentCart($request->cookie('uuid'));
        $cart->products()->detach();

        $newQuantity = $cart->products()->sum('quantity');
        $newAmount = $cart->products()->sum(DB::raw('quantity * price'));

        return response()->json(['newQuantity' => $newQuantity, 'newAmount' => $newAmount / 100]);
    }

    /**
     * Add one product in cart.
     */
    public function deleteProduct(Request $request)
    {
        $cart = $this->currentCart($request->cookie('uuid'));
        $cart->products()->detach($request->product_id);

        // обновляем данные
        $this->updateData($cart);

        return response()->json([
            'newQuantity' =>  $cart->products()->sum('quantity'),
            'newAmount' => $cart->products()->sum(DB::raw('quantity * price')) / 100
        ]);
    }

    /**
     * Reduces the quantity of the product by one
     */
    public function countMinusPlus(Request $request)
    {
        $cart = $this->currentCart($request->cookie('uuid'));
        $productQuantity = $request->old_quantity - 1;

        if ($request->operation == "plus") {
            $productQuantity = $request->old_quantity + 1;
        }
        if ($productQuantity <= 0) {
            return response()->json(['message' => 'Количество товара не может быть меньше одного!']);
        }

        // обновляем данные
        $cart->products()->sync([$request->product_id => ['quantity' => $productQuantity]], false);
        $this->updateData($cart);

        return response()->json([
            'productQuantity' => $productQuantity,
            'allQuantity' => $cart->products()->sum('quantity'),
            'allAmount' => $cart->products()->sum(DB::raw('quantity * price')) / 100,
            'productAmount' => round($cart->products()->find($request->product_id)->price / 100 * $productQuantity, 2),
        ]);
    }

    /**
     * Get model of current cart.
     */
    public function currentCart($session)
    {
        if (auth()->check()) {
            $cart = Cart::where('user_id', '=', auth()->user()->id)->firstOrfail();
        }
        else {
            $cart = Cart::where('session', '=', $session)->orderByDesc('updated_at')->firstOrfail();
        }

        return $cart;
    }

    /**
     * Update count and amount in carts.
     */
    public function updateData($cart) {
        // обновляем общее количество добавленных товаров в корзину
        $cart->quantity = $cart->products()->sum('quantity');
        $cart->amount = $cart->products()->sum(DB::raw('quantity * price'));
        $cart->save();
    }
}
