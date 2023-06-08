<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login\LoginStoreRequest;
use App\Http\Requests\Login\LoginUpdateRequest;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function create() {
        return view('auth.login.create');
    }

    public function store(LoginStoreRequest $request) {

        if (!auth()->attempt($request->only(['email', 'password']))) {
            throw ValidationException::withMessages([
                'email' => 'Данного e-mail не существует',
                'password' => 'Пароль неверный',
            ]);
        }

        $request->session()->regenerate();

//        if (Cart::where('user_id', '=', auth()->user()->id)->exists()) {
//            $c = Cart::where('session', '=', session('session_id'))->where('user_id', '=', Null)->first();
//            dd($c);
//            Cart::where('session', '=', session('session_id'))->where('user_id', '=', Null)->forceDelete();
//            Cart::where('user_id', '=', auth()->user()->id)->update(['session' =>  session('session_id')]);
//        }
//        else {
//            Cart::where('session', '=', session('session_id'))->update(['user_id' => auth()->user()->id]);
//        }

        return redirect('/')->with('success', 'Вы вошли в аккаунт');
    }

    public function update(LoginUpdateRequest $request)
    {
        $user = auth()->user();
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return redirect()->route('profile')->with('success', 'Данные были успешно обновлены');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Возвращайтесь!');
    }
}
