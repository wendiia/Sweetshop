<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('main.products.products', [
            'category' =>  "Вся продукция",
            'products' => Product::paginate(15),
            'photo' => 'main/img/all-products-photo.png',   // потом подумать, спросить, решить
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Создание продукта create";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Хранение(добавление) продукта store";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {

        return view('main.products.product', [
            'product' => Product::where('slug', $slug)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Редактирование продукта " . $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Обновление продукта " . $id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Удаление продукта " . $id;
    }
}
