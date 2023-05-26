<?php

namespace App\Http\Controllers;


use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('main.products.products_all', [
            'products' => Product::where('status', 'active')->paginate(15),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (empty($product)) {
            abort(404);
        }

        return view('main.products.product', compact('product'));
    }
}
