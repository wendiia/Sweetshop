<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductIndexRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Models\SpecialIngredient;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('main.categories');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductIndexRequest $request, string $slug)
    {
        $category = Category::where('slug', $slug)->first();
        if (empty($category)) {
            abort(404);
        }

        return view('main.products.products_category', [
            'category' => $category,
            'products' => Product::where([
                ['category_id', function ($query) use ($slug) {
                    $query->select('id')->from('categories')->where('slug', $slug);
                }],
                ['status', 'active'],
            ])->filter($request->all())->paginate(15)->withQueryString(),
            'maxPrice' => Product::where('status', '=', 'active')->max('price'),
            'sizes' => Size::orderBy('order')->get(),
            'specialIngredients' => SpecialIngredient::orderBy('name')->limit(3)->get(),
            'filterData' => $request->all(),
            'currentUrl' => $request->url(),
        ]);
    }
}
