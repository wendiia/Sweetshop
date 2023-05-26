<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

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
    public function show(string $slug)
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
            ])->paginate(15),
        ]);
    }
}
