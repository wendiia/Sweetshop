<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index', [
            'products' => Product::inRandomOrder()->take(3)->where('status', 'active')->get(),
        ]);
    }

}
