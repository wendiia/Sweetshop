<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('main.categories', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Создание категории create";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Хранение(добавление) категории store";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $category)
    {

        return view('main.products.products', [
            'category' =>  Category::where('slug', $category)->first()->title,
            'products' => Product::where('category_id', Category::where('slug', $category)->first()->id)->paginate(15),
            'photo' => Category::where('slug', $category)->first()->photo,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Редактирование категории " . $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Обновление категории " . $id;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Удаление категории " . $id;
    }
}
