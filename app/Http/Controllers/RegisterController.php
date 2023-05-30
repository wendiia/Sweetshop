<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register\RegisterStoreRequest;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.create');
    }

    public function store(RegisterStoreRequest $request)
    {
        if (!empty(User::pluck('phone')->search($request->phone))) {
            return back()->withInput($request->input())->withErrors(['phone' => 'Такой номер уже существует']);
        }

        $user = User::create($request->all());
        auth()->login($user);
        return redirect('/')->with('success', 'Ваш аккаунт был создан');
    }
}
