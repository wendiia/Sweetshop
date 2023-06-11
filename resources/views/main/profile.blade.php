@extends('main.layouts.master')

@section('content')
    <section>
        <form method="POST" action="{{route('login.update')}}">
            @csrf

            <!-- Модальное окно -->
            <div class="modal fade" id="ModalEditProfile" tabindex="-1" aria-labelledby="ModalEditProfile"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalEditProfile">Изменение личных данных</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="first_name" class="mb-2 fs-5"> <span class="text-danger">*</span> Имя:
                                </label>
                                <input type="text" id="first_name" name="first_name" value="{{$user->first_name}}"
                                       class="form-control my-form-control fs-5 ps-4 @error('first_name') is-invalid @enderror"
                                       required>
                                @error('first_name')
                                <p class="text-danger fs-6"> {{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="last_name" class="mb-2 fs-5"> <span class="text-danger">*</span> Фамилия:
                                </label>
                                <input type="text" id="last_name" name="last_name" value="{{$user->last_name}}"
                                       class="form-control my-form-control fs-5 ps-4 @error('last_name') is-invalid @enderror"
                                       required>
                                @error('last_name')
                                <p class="text-danger fs-6"> {{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="middle_name" class="mb-2 fs-5"> Отчество: </label>
                                <input type="text" id="middle_name" name="middle_name" value="{{$user->middle_name}}"
                                       class="form-control my-form-control fs-5 ps-4  @error('middle_name') is-invalid @enderror">
                                @error('middle_name')
                                <p class="text-danger fs-6"> {{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="phone" class="mb-2 fs-5"> <span class="text-danger">*</span> Телефон:
                                </label>
                                <input type="tel" id="phone" name="phone" value="{{$user->phone}}"
                                       class="form-control my-form-control fs-5 ps-4 @error('phone') is-invalid @enderror"
                                       required>
                                @error('phone')
                                <p class="text-danger fs-6"> {{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="email" class="mb-2 fs-5"> <span class="text-danger">*</span> E-mail:
                                </label>
                                <input type="email" id="email" name="email" value="{{$user->email}}"
                                       class="form-control my-form-control fs-5 ps-4 @error('email') is-invalid @enderror"
                                       required>
                                @error('email')
                                <p class="text-danger fs-6"> {{ $message }} </p>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>

        <div class="container ">
            <!-- Крошки -->
            <div class="row breadcrumbs mb-3">
                <nav
                    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Главная</a></li>
                        <li class="breadcrumb-item"> Профиль</li>
                    </ol>
                </nav>
            </div>

            <div class="row mb-3">
                <h1 class="display-5 pe-1">Личные данные</h1>
            </div>

            <div class="row">
                <div class="col">
                    <div class="bg-white my-rounded shadow-sm px-4 mb-4 py-3 d-flex  ">
                        <button class="btn-profile-photo rounded-circle my-auto fs-1 me-4"> {{ $user->first_name[3] }} </button>

                        <div class="d-flex flex-column justify-content-between">
                            <h3 class="fs-4">
                                {{$user->last_name . ' ' . $user->first_name . ' ' . $user->middle_name}}
                                <button onclick="clicked()" class="btn-none btnEdit" data-bs-toggle="modal"
                                        data-bs-target="#ModalEditProfile" id="btnEditProfile">
                                    <i class="fa-solid fa-pen fa-2xs" style="color: #ff8282;"></i>
                                </button>
                            </h3>
                            <div class="d-flex">
                                <p class="fs-5 me-3"> Email: {{$user->email}} </p>
                                <p class="fs-5"> Телефон: {{$user->phone}} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <h1 class="display-5 pe-1">История заказов</h1>
            </div>

            @if(!$orders->isEmpty())
                @foreach($orders as $order)
                    <div class="row align-content-center justify-content-center">
                        <div class="row mb-4">
                            <div class="col px-0">
                                <div class="bg-white my-rounded shadow-sm p-4 user-order">
                                    <div class="temp-div"></div>
                                    <div class="mb-5">
                                        <div class="d-flex mb-2 justify-content-between">
                                            <h1 class="fw-bold fs-3 mb-2">Заказ №{{$order->id}}
                                                <span class="fs-5 fw-normal">
                                                    от {{ date('d.m.Y', strtotime($order->created_at))}}
                                                </span>
                                            </h1>
                                            <p class="fs-5 my-auto">
                                                <i class="fa-solid fa-circle fa-xs"
                                                   style="color: {{$statusColor[$order->status]}}; padding-right: 10px;">
                                                </i>
                                                {{$order->status}}
                                            </p>
                                        </div>

                                        <div class="d-flex">
                                            <p class="fs-5  pe-4">
                                                Сумма:
                                                <span class="color-font-pink fw-bold">{{$order->amount / 100}} руб.
                                                </span>
                                            </p>
                                            <p class="fs-5 pe-4">
                                                Товаров:
                                                <span class="color-font-pink fw-bold">{{$order->quantity}} </span>
                                            </p>

                                            <p class="fs-5">
                                                Желаемая дата выдачи:
                                                <span class="color-font-pink fw-bold">{{$order->date_readiness}} </span>
                                            </p>

                                        </div>
                                    </div>

                                    <div class="history-orders">
                                        @foreach($order->products as $product)
                                            <div class="cart-item px-4">
                                                <div class="d-flex justify-content-between mb-3">

                                                    <div class="d-flex">
                                                        <a href="#"> <img src="{{asset($product->photo)}}"
                                                                          class="img-fluid rounded-3 cart-img me-3" style=""
                                                                          alt="Товар в корзине"></a>
                                                        <div class="d-flex flex-column justify-content-start cart-desc">
                                                            <a href="#" class="text-decoration-none color-font-grey"><p
                                                                    class="fs-5 fw-bold"> {{ $product->title }} </p></a>
                                                            <p class="fs-6 color-font-pink"> {{ $product->weight }} г </p>
                                                            <p class="fs-6"> Категория: {{ $product->category->title }} </p>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex">
                                                        <p class="fs-6 my-auto me-2"> {{ $product->pivot->quantity }} шт. </p>
                                                        <p class="fs-6 my-auto me-2">х</p>
                                                        <h5 class="color-font-pink fs-6 my-auto fw-bold"> {{ $product->pivot->price }} ₽</h5>
                                                    </div>

                                                    <div class="d-flex">
                                                        <p class="fs-6 my-auto me-2"> Сумма: </p>
                                                        <h5 class="color-font-pink fs-6 my-auto fw-bold"> {{ $product->pivot->amount }} ₽</h5>
                                                    </div>
                                                </div>

                                                <hr class="hr-line mx-5">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <x-flash/>

    @if ($errors->any())
        <script defer src="{{asset('main/js/profile.js')}}"></script>--}}
    @endif

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
