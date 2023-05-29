<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login\LoginStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create() {
        return view('auth.sessions.create');
    }

    public function store(LoginStoreRequest $request) {
        if (auth()->attempt($request->only(['email', 'password']))) {
            return redirect('/')->with('success', 'Вы вошли в аккаунт');
        }

        return back()->withErrors(['email' => 'Данного e-mail не существует', 'password' => 'Пароль неверный']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Возвращайтесь!');
    }
}
