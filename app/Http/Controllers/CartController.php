<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('main.cart');
    }

    public function addToCart(Request $request)
    {
//        dd($request->all());
//        dump("hjk");
//        if (auth()->check()) {
//            $cart = Cart::where('user_id', '=', auth()->user()->id)->firstOrfail;
//
//            if ()
//
//            $cart->products()->attach($request->product_id, ['quantity' => 1]);
//
//        }


//        $cart = Cart::updateOrCreate([
//            'user_id' => $user_id,
//        ]);
//
//
//        $cart->products()->attach($product_id, ['quantity' => 3]);
//        return redirect()->back();


        return response()->json(['data' => auth()->user()->id]);
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
