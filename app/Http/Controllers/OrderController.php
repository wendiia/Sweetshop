<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'date_input' => 'required|date|after:now',
        ]);

        $user = auth()->user();
        $cart = $user->cart;

        $order = Order::create([
            'user_id' => $user->id,
            'date_readiness' => $request->date_input,
            'quantity' => $user->cart->quantity,
            'amount' => $user->cart->amount,
        ]);

        foreach ($cart->products as $key=>$product) {
            $dataOrderProduct[$key] = [
                'product_id' => $product->id,
                'quantity' => $product->pivot->quantity,
                'price' => $product->price,
                'amount' => $product->pivot->quantity * $product->price,
            ];
        }

        $order->products()->attach($dataOrderProduct);
        $cart->products()->detach();

        return back()->with('success', 'Ваш заказ был успешно оформлен!');
    }
}
