<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register\RegisterStoreRequest;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register.create');
    }

    public function store(RegisterStoreRequest $request)
    {
        if (!empty(User::pluck('phone')->search($request->phone))) {
            return back()->withInput($request->input())->withErrors(['phone' => 'Такой номер уже существует']);
        }

        // Создание новго пользвателя
        $user = User::create($request->all());

        $session = $request->cookie('uuid');
        $cart = Cart::where('session', '=', $session)->first();

        if (empty($cart)) { // Если корзины нет, то присваиваем сессию и user_id
            Cart::create(['session' => $session, 'user_id' => $user->id]);
        }
        else { // Если корзина уже создана (без авторизации), то присваиваем только user_id
            $cart->update(['user_id' => $user->id]);
        }

        auth()->login($user);
        return redirect('/')->with('success', 'Ваш аккаунт был создан');
    }
}
