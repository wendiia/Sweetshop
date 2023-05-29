@extends('main.layouts.master')

@section('content')

    <div class="container  py-0 mt-0">
        <!-- Регистрация -->
        <div class="row align-items-center justify-content-center register-form">
            <div class="col-4">
                <div class="bg-white my-rounded register-frame">
                    <h1 class="fs-2 color-font-pink fw-bold text-center mb-3 ">Регистрация</h1>
                    <form method="POST" action="{{route('register.store')}}">
                        @csrf

                        <div class="mb-2">
                            <label for="first_name" class="mb-2 fs-5"> <span class="text-danger">*</span> Имя: </label>
                            <input type="text" id="first_name" name="first_name" value="{{old('first_name')}}"
                                   class="form-control my-form-control fs-5 ps-4 @error('first_name') is-invalid @enderror"
                                   required>
                            @error('first_name')
                            <p class="text-danger fs-6"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="last_name" class="mb-2 fs-5"> <span class="text-danger">*</span> Фамилия:
                            </label>
                            <input type="text" id="last_name" name="last_name" value="{{old('last_name')}}"
                                   class="form-control my-form-control fs-5 ps-4 @error('last_name') is-invalid @enderror"
                                   required>
                            @error('last_name')
                            <p class="text-danger fs-6"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="middle_name" class="mb-2 fs-5"> Отчество: </label>
                            <input type="text" id="middle_name" name="middle_name" value="{{old('middle_name')}}"
                                   class="form-control my-form-control fs-5 ps-4  @error('middle_name') is-invalid @enderror">
                            @error('middle_name')
                            <p class="text-danger fs-6"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="phone" class="mb-2 fs-5"> <span class="text-danger">*</span> Телефон: </label>
                            <input type="tel" id="phone" name="phone" value="{{old('phone')}}"
                                   class="form-control my-form-control fs-5 ps-4 @error('phone') is-invalid @enderror"
                                   required>
                            @error('phone')
                            <p class="text-danger fs-6"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="email" class="mb-2 fs-5"> <span class="text-danger">*</span> E-mail: </label>
                            <input type="email" id="email" name="email" value="{{old('email')}}"
                                   class="form-control my-form-control fs-5 ps-4 @error('email') is-invalid @enderror"
                                   required>
                            @error('email')
                            <p class="text-danger fs-6"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="password" class="mb-2 fs-5"> <span class="text-danger">*</span> Пароль: </label>
                            <input type="password" id="password" name="password"
                                   class="form-control my-form-control fs-5 ps-4 @error('password') is-invalid @enderror"
                                   required>
                            @error('password')
                            <p class="text-danger fs-6"> {{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-repeat" class="mb-2 fs-5"> Подтверждение пароля: </label>
                            <input type="password" id="password-repeat" name="passwordRepeat"
                                   class="form-control my-form-control fs-5 ps-4  @error('passwordRepeat') is-invalid @enderror"
                                   required>
                            @error('passwordRepeat')
                            <p class="text-danger fs-6"> {{ $message }} </p>
                            @enderror
                        </div>

                        <button type="submit" class="btn mx-auto fs-5 px-5">
                            Подтвердить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_script')
    <script src="https://unpkg.com/imask"></script>

    <script>
        let phoneMask = IMask(
            document.getElementById('phone'), {
                mask: '+{7}(000)000-00-00',
                lazy: false,
            });
    </script>
@endsection
