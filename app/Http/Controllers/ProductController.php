<?php

namespace App\Http\Controllers;


use App\Http\Requests\Product\ProductIndexRequest;
use App\Models\Product;
use App\Models\Size;
use App\Models\SpecialIngredient;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductIndexRequest $request)
    {
//        dump(session()->all());

        $products = Product::where('status', '=', 'active')
            ->filter($request->all())->paginate(15)->withQueryString();

        if ($request->has('sort') and $request->sort <> 'none') {
            $type_sort = explode('.', $request->sort);
            $products = Product::where('status', '=', 'active')->orderBy($type_sort[0], $type_sort[1])
                    ->filter($request->all())->paginate(15)->withQueryString();
        }

        return view('main.products.products_all', [
            'products' => $products,
            'maxPrice' => Product::where('status', '=', 'active')->max('price'),
            'sizes' => Size::orderBy('order')->get(),
            'specialIngredients' => SpecialIngredient::orderBy('name')->get(),
            'filterData' => $request->all(),
            'currentUrl' => $request->url(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        if (empty($product)) {
            throw new NotFoundHttpException('Product not found');
        }

        return view('main.products.product', compact('product'));
    }
}
