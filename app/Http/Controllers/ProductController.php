<?php

namespace App\Http\Controllers;


use App\Http\Requests\Product\ProductIndexRequest;
use App\Models\Product;
use App\Models\Size;
use App\Models\SpecialIngredient;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductIndexRequest $request)
    {

        return view('main.products.products_all', [
            'products' => Product::where('status', '=', 'active')
                ->filter($request->all())->paginate(15)->withQueryString(),
            'maxPrice' => Product::where('status', '=', 'active')->max('price'),
            'sizes' => Size::orderBy('order')->get(),
            'specialIngredients' => SpecialIngredient::orderBy('name')->limit(3)->get(),
            'filterData' => $request->all(),
            'currentUrl' => $request->url(),
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
