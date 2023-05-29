<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductIndexRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Models\SpecialIngredient;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $category = Category::where('slug', $slug)->firstOrFail();
        if (empty($category)) {
            throw new NotFoundHttpException('Category not found');
        }

        $products = Product::where([
            ['category_id', function ($query) use ($slug) {
                $query->select('id')->from('categories')->where('slug', $slug);
            }],
            ['status', 'active'],])->filter($request->all())->paginate(15)->withQueryString();

        if ($request->has('sort') and $request->sort <> 'none') {
            $type_sort = explode('.', $request->sort);
            $products = Product::where([
                ['category_id', function ($query) use ($slug) {
                    $query->select('id')->from('categories')->where('slug', $slug);}],
                ['status', 'active'],])
                ->orderBy($type_sort[0], $type_sort[1])
                ->filter($request->all())->paginate(15)->withQueryString();
        }

        return view('main.products.products_category', [
            'category' => $category,
            'products' => $products,
            'maxPrice' => Product::where('status', '=', 'active')->max('price'),
            'sizes' => Size::orderBy('order')->get(),
            'specialIngredients' => SpecialIngredient::orderBy('name')->get(),
            'filterData' => $request->all(),
            'currentUrl' => $request->url(),
        ]);
    }
}
