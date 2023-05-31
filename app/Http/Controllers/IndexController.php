<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        $productsByCategory = collect();
        foreach (Category::all() as $category) {
            $productsByCategory->put($category->slug, Product::inRandomOrder()->take(3)->where([
                ['status', '=', 'active'],
                ['category_id', '=', $category->id],
            ])->get());
        }

        return view('index', [
            'productsByCategory' => $productsByCategory,
            'banners' => Banner::all(),
        ]);
    }

}
