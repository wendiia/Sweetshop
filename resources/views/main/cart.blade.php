@extends('main.layouts.master')

@section('content')
<section>
    <div class="container ">
        <!-- Крошки -->
        <div class="row breadcrumbs mb-3">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Главная</a></li>
                    <li class="breadcrumb-item"><a href="#">Корзина</a></li>
                </ol>
            </nav>
        </div>

        <div class="row mb-3">
            <div class="d-flex">
                <h1 class="display-5 pe-1">Корзина</h1>
                <p class="fs-4"> 5</p>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="bg-white my-rounded px-4 mb-4 py-3 d-flex justify-content-between align-center ">
                    <p class="fs-6 my-auto">
                        <i class="fa-solid fa-circle-exclamation fa-xl pe-3" style="color: #fc9093;"></i>
                        Авторизуйтесь или зарегистрируйтесь, чтобы оформить заказ
                    </p>
                    <button class="btn shadow-sm fs-6 px-5 py-1" type="button"> Войти </button>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-3">
                <button class="color-font-pink fs-5 btn-none ">Удалить все товары </button>
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <div class="bg-white my-rounded p-4">
                    <div class="cart-item d-flex justify-content-between">

                        <div class="d-flex">
                            <img src="{{asset('main/img/cake1.jpg')}}" class="img-fluid rounded-3 cart-img me-3"
                                style="" alt="Товар в корзине">
                            <div class="d-flex flex-column justify-content-center cart-desc">
                                <p class="fs-5 fw-bold">Наполеон с ягодами </p>
                                <p class="fs-6 color-font-pink"> 650 г </p>
                                <p class="fs-6"> Категория: торт </p>
                                <button class="color-font-pink fs-6 btn-none me-auto p-0">Удалить </button>
                            </div>
                        </div>

                        <div class="btns-count d-flex">
                            <button class="btn my-auto me-2"> <i class="fa-solid fa-plus fa-xs"
                                    style="color: #ffffff;"></i>
                            </button>
                            <p class="fs-6 my-auto me-2"> 2 шт. </p>
                            <button class="btn my-auto"> <i class="fa-solid fa-minus fa-xs" style="color: #ffffff;"></i>
                            </button>
                        </div>

                        <h5 class="color-font-pink fs-5 my-auto fw-bold">1500 ₽</h5>
                    </div>

                    <hr class="hr-line mx-5">

                    <div class="cart-item d-flex justify-content-between">

                        <div class="d-flex">
                            <img src="{{asset('main/img/cake2.jpeg')}}" class="img-fluid rounded-3 cart-img me-3"
                                style="" alt="Товар в корзине">
                            <div class="d-flex flex-column justify-content-center cart-desc">
                                <p class="fs-5 fw-bold">Наполеон с ягодами </p>
                                <p class="fs-6 color-font-pink"> 650 г </p>
                                <p class="fs-6"> Категория: торт </p>
                                <button class="color-font-pink fs-6 btn-none me-auto p-0">Удалить </button>
                            </div>
                        </div>

                        <div class="btns-count d-flex">
                            <button class="btn my-auto me-2"> <i class="fa-solid fa-plus fa-xs"
                                    style="color: #ffffff;"></i>
                            </button>
                            <p class="fs-6 my-auto me-2"> 2 шт. </p>
                            <button class="btn my-auto"> <i class="fa-solid fa-minus fa-xs" style="color: #ffffff;"></i>
                            </button>
                        </div>

                        <h5 class="color-font-pink fs-5 my-auto fw-bold">1500 ₽</h5>
                    </div>

                    <hr class="hr-line mx-5">

                    <div class="cart-item d-flex justify-content-between">

                        <div class="d-flex">
                            <img src="{{asset('main/img/cake3.png')}}" class="img-fluid rounded-3 cart-img me-3"
                                style="" alt="Товар в корзине">
                            <div class="d-flex flex-column justify-content-center cart-desc">
                                <p class="fs-5 fw-bold">Наполеон с ягодами </p>
                                <p class="fs-6 color-font-pink"> 650 г </p>
                                <p class="fs-6"> Категория: торт </p>
                                <button class="color-font-pink fs-6 btn-none me-auto p-0">Удалить </button>
                            </div>
                        </div>

                        <div class="btns-count d-flex">
                            <button class="btn my-auto me-2"> <i class="fa-solid fa-plus fa-xs"
                                    style="color: #ffffff;"></i>
                            </button>
                            <p class="fs-6 my-auto me-2"> 2 шт. </p>
                            <button class="btn my-auto"> <i class="fa-solid fa-minus fa-xs" style="color: #ffffff;"></i>
                            </button>
                        </div>

                        <h5 class="color-font-pink fs-5 my-auto fw-bold">1500 ₽</h5>
                    </div>

                    <hr class="hr-line mx-5">
                </div>
            </div>

            <div class="col-4">
                <div class="bg-white my-rounded p-4">
                    <h1 class="fs-4 text-center mb-4 fw-bold">Оставить заявку</h1>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control my-form-control mb-3" id="" placeholder="ФИО">
                            <input type="tel" class="form-control my-form-control mb-3" id="" placeholder="Телефон">
                            <input type="email" class="form-control my-form-control mb-3" id="" placeholder="Email">
                            <input type="date" class="form-control my-form-control mb-3" id="" placeholder="Email">
                        </div>

                        <p class="fs-6 my-auto text-center mb-2">
                            Вся информация будет отправлена на почту, когда заказ будет готов, мы с вами свяжемся!
                        </p>

                        <div class="d-flex justify-content-between mb-2">
                            <p class="fs-4 fw-bold my-auto">Общая стоимость:</p>
                            <p class="fs-3 color-font-pink fw-bold my-auto ">1500 ₽</p>
                        </div>

                        <button type="submit" class="btn w-100 ">Оформить заказ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection