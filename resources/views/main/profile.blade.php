@extends('main.layouts.master')

@section('content')
    <section>


        <!-- Модальное окно -->
        <div class="modal fade" id="ModalEditProfile" tabindex="-1" aria-labelledby="ModalEditProfile" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalEditProfile">Изменение личных данных</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control my-form-control mb-3" id="" placeholder="Имя">
                        <input type="text" class="form-control my-form-control mb-3" id="" placeholder="Фамилия">
                        <input type="text" class="form-control my-form-control mb-3" id="" placeholder="Отчество">
                        <input type="tel" class="form-control my-form-control mb-3" id="" placeholder="Номер телефона">
                        <input type="email" class="form-control my-form-control mb-3" id="" placeholder="Email">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="button" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </div>
        </div>


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
                        <button class="btn-profile-photo rounded-circle my-auto fs-1 me-4"> Н</button>
                        <div class="d-flex flex-column justify-content-between">
                            <h3 class="fs-4">Курлыкина Наталья
                                <button class="btn-none" data-bs-toggle="modal" data-bs-target="#ModalEditProfile">
                                    <i class="fa-solid fa-pen fa-2xs" style="color: #ff8282;"></i>
                                </button>
                            </h3>
                            <div class="d-flex">
                                <p class="fs-5 me-3"> Email: Wesdfkj@mail.ru</p>
                                <p class="fs-5"> Телефон: 8974342658</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <h1 class="display-5 pe-1">История заказов</h1>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <div class="bg-white my-rounded shadow-sm p-4 user-order">
                        <div class="temp-div"></div>
                        <div class="mb-5">
                            <div class="d-flex mb-2 justify-content-between">
                                <h3 class="fw-bold">Заказ №11273867853 от 23.07.22 </h3>
                                <p class="fs-5 my-auto"><i class="fa-solid fa-circle fa-xs"
                                                           style="color: #fec343; padding-right: 10px;"></i>В процессе
                                </p>
                            </div>

                            <p class="fs-5 color-font-pink">Сумма: 6 000 руб. </p>
                        </div>

                        <div class="history-orders">
                            <div class="cart-item d-flex justify-content-between mb-3">
                                <div class="d-flex">
                                    <a href="{{route('product')}}"> <img src="{{asset('main/img/cake1.jpg')}}"
                                                                         class="img-fluid rounded-3 cart-img me-3" style=""
                                                                         alt="Товар в корзине"></a>
                                    <div class="d-flex flex-column justify-content-start cart-desc">
                                        <a href="{{route('product')}}" class="text-decoration-none color-font-grey"><p
                                                class="fs-5 fw-bold">Наполеон с ягодами </p></a>
                                        <p class="fs-6 color-font-pink"> 650 г </p>
                                        <p class="fs-6"> Категория: торт </p>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <p class="fs-6 my-auto me-2"> 2 шт. </p>
                                    <p class="fs-6 my-auto me-2">х</p>
                                    <h5 class="color-font-pink fs-6 my-auto fw-bold">750 ₽</h5>
                                </div>

                                <div class="d-flex">
                                    <p class="fs-6 my-auto me-2"> Сумма: </p>
                                    <h5 class="color-font-pink fs-6 my-auto fw-bold">1500 ₽</h5>
                                </div>
                            </div>

                            <hr class="hr-line mx-5">

                            <div class="cart-item d-flex justify-content-between mb-3">
                                <div class="d-flex">
                                    <a href="{{route('product')}}"> <img src="{{asset('main/img/cake2.jpeg')}}"
                                                                         class="img-fluid rounded-3 cart-img me-3" style=""
                                                                         alt="Товар в корзине"></a>
                                    <div class="d-flex flex-column justify-content-start cart-desc">
                                        <a href="{{route('product')}}" class="text-decoration-none color-font-grey"><p
                                                class="fs-5 fw-bold">Наполеон с ягодами </p></a>
                                        <p class="fs-6 color-font-pink"> 650 г </p>
                                        <p class="fs-6"> Категория: торт </p>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <p class="fs-6 my-auto me-2"> 2 шт. </p>
                                    <p class="fs-6 my-auto me-2">х</p>
                                    <h5 class="color-font-pink fs-6 my-auto fw-bold">750 ₽</h5>
                                </div>

                                <div class="d-flex">
                                    <p class="fs-6 my-auto me-2"> Сумма: </p>
                                    <h5 class="color-font-pink fs-6 my-auto fw-bold">1500 ₽</h5>
                                </div>
                            </div>

                            <hr class="hr-line mx-5">

                            <div class="cart-item d-flex justify-content-between mb-3">
                                <div class="d-flex">
                                    <a href="{{route('product')}}"> <img src="{{asset('main/img/cake3.png')}}"
                                                                         class="img-fluid rounded-3 cart-img me-3" style=""
                                                                         alt="Товар в корзине"></a>
                                    <div class="d-flex flex-column justify-content-start cart-desc">
                                        <a href="{{route('product')}}" class="text-decoration-none color-font-grey"><p
                                                class="fs-5 fw-bold">Наполеон с ягодами </p></a>
                                        <p class="fs-6 color-font-pink"> 650 г </p>
                                        <p class="fs-6"> Категория: торт </p>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <p class="fs-6 my-auto me-2"> 2 шт. </p>
                                    <p class="fs-6 my-auto me-2">х</p>
                                    <h5 class="color-font-pink fs-6 my-auto fw-bold">750 ₽</h5>
                                </div>

                                <div class="d-flex">
                                    <p class="fs-6 my-auto me-2"> Сумма: </p>
                                    <h5 class="color-font-pink fs-6 my-auto fw-bold">1500 ₽</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="bg-white my-rounded shadow-sm p-4 user-order">
                        <div class="temp-div"></div>
                        <div class="mb-5">
                            <div class="d-flex mb-2 justify-content-between">
                                <h3 class="fw-bold">Заказ №45876867853 от 12.07.23 </h3>
                                <p class="fs-5 my-auto"><i class="fa-solid fa-circle fa-xs"
                                                           style="color: #83BF91; padding-right: 10px;"></i>Выдано</p>
                            </div>

                            <p class="fs-5 color-font-pink">Сумма: 6 000 руб. </p>
                        </div>

                        <div class="history-orders">

                            <div class="cart-item d-flex justify-content-between mb-3">
                                <div class="d-flex">
                                    <a href="{{route('product')}}"> <img src="{{asset('main/img/cake2.jpeg')}}"
                                                                         class="img-fluid rounded-3 cart-img me-3" style=""
                                                                         alt="Товар в корзине"></a>
                                    <div class="d-flex flex-column justify-content-start cart-desc">
                                        <a href="{{route('product')}}" class="text-decoration-none color-font-grey"><p
                                                class="fs-5 fw-bold">Наполеон с ягодами </p></a>
                                        <p class="fs-6 color-font-pink"> 650 г </p>
                                        <p class="fs-6"> Категория: торт </p>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <p class="fs-6 my-auto me-2"> 2 шт. </p>
                                    <p class="fs-6 my-auto me-2">х</p>
                                    <h5 class="color-font-pink fs-6 my-auto fw-bold">750 ₽</h5>
                                </div>

                                <div class="d-flex">
                                    <p class="fs-6 my-auto me-2"> Сумма: </p>
                                    <h5 class="color-font-pink fs-6 my-auto fw-bold">1500 ₽</h5>
                                </div>
                            </div>

                            <hr class="hr-line mx-5">

                            <div class="cart-item d-flex justify-content-between mb-3">
                                <div class="d-flex">
                                    <a href="{{route('product')}}"> <img src="{{asset('main/img/cake3.png')}}"
                                                                         class="img-fluid rounded-3 cart-img me-3" style=""
                                                                         alt="Товар в корзине"></a>
                                    <div class="d-flex flex-column justify-content-start cart-desc">
                                        <a href="{{route('product')}}" class="text-decoration-none color-font-grey"><p
                                                class="fs-5 fw-bold">Наполеон с ягодами </p></a>
                                        <p class="fs-6 color-font-pink"> 650 г </p>
                                        <p class="fs-6"> Категория: торт </p>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <p class="fs-6 my-auto me-2"> 2 шт. </p>
                                    <p class="fs-6 my-auto me-2">х</p>
                                    <h5 class="color-font-pink fs-6 my-auto fw-bold">750 ₽</h5>
                                </div>

                                <div class="d-flex">
                                    <p class="fs-6 my-auto me-2"> Сумма: </p>
                                    <h5 class="color-font-pink fs-6 my-auto fw-bold">1500 ₽</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </section>

@endsection
