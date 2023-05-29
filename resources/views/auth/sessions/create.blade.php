@extends('main.layouts.master')

@section('content')

    <div class="container  py-0 mt-0">
        <!-- Вход в аккаунт -->
        <div class="row align-items-center justify-content-center register-form">
            <div class="col-4">
                <div class="bg-white my-rounded register-frame">
                    <h1 class="fs-2 color-font-pink fw-bold text-center mb-3 "> Вход </h1>
                    <form method="POST" action="{{route('login.store')}}">

                        @csrf

                        <div class="mb-2">
                            <label for="email" class="mb-2 fs-5"> E-mail: </label>
                            <input type="email" id="email" name="email" value="{{old('email')}}"
                                   class="form-control my-form-control fs-5 ps-4 @error('email') is-invalid @enderror"
                                   required>
                            @error('email')
                            <p class="text-danger fs-6"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="mb-2 fs-5"> Пароль: </label>
                            <input type="password" id="password" name="password"
                                   class="form-control my-form-control fs-5 ps-4 @error('password') is-invalid @enderror"
                                   required>
                            @error('password')
                            <p class="text-danger fs-6"> {{ $message }} </p>
                            @enderror
                        </div>

                        <button type="submit" class="btn mx-auto fs-5 px-5">
                            Войти
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
