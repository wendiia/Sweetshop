@extends('main.layouts.master')

@section('content')

<div class="container container-margin">
    <!-- Баннер  -->
    <section class="section_category_banner pb-5">
        <div class="row">
            <img src="{{asset('main/img/banner-waffle.png')}}" class="img-fluid " alt="Баннер вафли">
        </div>
    </section>

    <!-- Продукция -->
    <section class="section_products py-0">

        <!-- Крошки -->
        <div class="row breadcrumbs">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Вафли</li>
                </ol>
            </nav>
        </div>

        <!-- Название каталога -->
        <div class="row">
            <div class="col-12 d-flex align-items-center mb-2">
                <h1 class="display-5 pe-3">Вафли</h1>
                <p class="my-0 fs-6">найдено: 20</p>
            </div>
        </div>


        <div class="row  ">
            <!-- Фильтр товаров -->
            <div class="col-2">
                <button class="color-font-pink fs-6 btn-none mb-2 p-0 m-0">Сбросить <img
                        src="{{asset('main/img/clear.png')}}" alt="Сброс" width="20" height="20"></button>

                {{--     Фильтр цены    --}}
                <div class="filter-cost">
                    <h3 class="fw-bold fs-4 mb-3">Цена</h3>
                    <div class="wrapper-range mb-4">
                        <div class="container1">
                            <div class="slider-track"></div>
                            <input type="range" min="0" max="100" value="0" id="slider-1" oninput="slideOne()">
                            <input type="range" min="0" max="100" value="100" id="slider-2" oninput="slideTwo()">
                        </div>

                        <div class="form-row d-flex justify-content-between">
                            <div class="form-group col-md-6 pe-2">
                                <input id="range1" class="form-control my-form-control ps-2 " placeholder="От"
                                    type="number">
                            </div>
                            <div class="form-group text-right col-md-6 ps-2">
                                <input id="range2" class="form-control my-form-control ps-2" placeholder="До"
                                    type="number">
                            </div>
                        </div>
                    </div>
                </div>
                {{--     Фильтр размер    --}}
                <div class="filter-size">
                    <div class="accordion" id="accordion_size">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button btn-dropdown fs-4" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseSize" aria-expanded="true"
                                    aria-controls="collapseSize">
                                    Размер
                                </button>
                            </h2>
                            <div id="collapseSize" class="accordion-collapse collapse show"
                                data-bs-parent="#accordion_size">
                                <div class="accordion-body ps-0 fs-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Маленький
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Средний
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Большой
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--     Фильтр ингредиенты    --}}
                <div class="filter-ingredients">
                    <div class="accordion" id="accordion_ingredients">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button btn-dropdown fs-4" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseIngredients" aria-expanded="true"
                                    aria-controls="collapseIngredients">
                                    Ингредиенты
                                </button>
                            </h2>
                            <div id="collapseIngredients" class="accordion-collapse collapse show"
                                data-bs-parent="#accordion_ingredients">
                                <div class="accordion-body ps-0 fs-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Орехи
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Мед
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Какао
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Продукция -->
            <div class="col-10 test pt-2">

                <select class="form-select my-form-select ms-4" aria-label="Default select example">
                    <option value="1">Популярные</option>
                    <option value="1">Дешевые</option>
                    <option value="2">Дорогие</option>
                    <option value="3">Новинки</option>
                </select>

                <hr class="hr-line">

                <div class="row row-cols-1 row-cols-md-3 px-4 g-4">
                    <div class="col">
                        <div class="card card-product h-100">
                            <a href="{{route('product')}}"><img src="{{'main/img/cake1.jpg'}}" class="card-img-top mb-2" alt="..."></a> 
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="card-cost-social d-flex mb-2">
                                    <h5 class="card-cost fs-4 my-auto pe-3">1500 ₽</h5>
                                    <p class="fs-6 my-auto pe-2"> <i class="fa-solid fa-star"
                                            style="color: #ffd500;"></i> 4.5 </p>
                                    <p class="fs-6 my-auto"> <i class="fa-regular fa-comment"
                                            style="color: #b0b0b0;"></i> 2 </p>
                                </div>
                                <p class="card-title fs-5 mb-3">Наполеон с ягодами
                                    <span class="card-weight fs-5 color-font-pink"> 650 г </span>
                                </p>
                                <button class="btn btn-product shadow-sm fs-" type="button"> В корзину </button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-product h-100">
                            <img src="{{'main/img/cake2.jpeg'}}" class="card-img-top mb-2" alt="...">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="card-cost-social d-flex mb-2">
                                    <h5 class="card-cost fs-4 my-auto pe-3">1500 ₽</h5>
                                    <p class="fs-6 my-auto pe-2"> <i class="fa-solid fa-star"
                                            style="color: #ffd500;"></i> 4.5 </p>
                                    <p class="fs-6 my-auto"> <i class="fa-regular fa-comment"
                                            style="color: #b0b0b0;"></i> 2 </p>
                                </div>
                                <p class="card-title fs-5 mb-3">Наполеон с ягодами
                                    <span class="card-weight fs-5 color-font-pink"> 650 г </span>
                                </p>
                                <button class="btn btn-product shadow-sm fs-" type="button"> В корзину </button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-product h-100">
                            <img src="{{'main/img/cake3.png'}}" class="card-img-top mb-2" alt="...">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="card-cost-social d-flex mb-2">
                                    <h5 class="card-cost fs-4 my-auto pe-3">1500 ₽</h5>
                                    <p class="fs-6 my-auto pe-2"> <i class="fa-solid fa-star"
                                            style="color: #ffd500;"></i> 4.5 </p>
                                    <p class="fs-6 my-auto"> <i class="fa-regular fa-comment"
                                            style="color: #b0b0b0;"></i> 2 </p>
                                </div>
                                <p class="card-title fs-5 mb-3">Наполеон с ягодами
                                    <span class="card-weight fs-5 color-font-pink"> 650 г </span>
                                </p>
                                <button class="btn btn-product shadow-sm fs-" type="button"> В корзину </button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-product h-100">
                            <img src="{{'main/img/cake3.png'}}" class="card-img-top mb-2" alt="...">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="card-cost-social d-flex mb-2">
                                    <h5 class="card-cost fs-4 my-auto pe-3">1500 ₽</h5>
                                    <p class="fs-6 my-auto pe-2"> <i class="fa-solid fa-star"
                                            style="color: #ffd500;"></i> 4.5 </p>
                                    <p class="fs-6 my-auto"> <i class="fa-regular fa-comment"
                                            style="color: #b0b0b0;"></i> 2 </p>
                                </div>
                                <p class="card-title fs-5 mb-3">Наполеон с ягодами
                                    <span class="card-weight fs-5 color-font-pink"> 650 г </span>
                                </p>
                                <button class="btn btn-product shadow-sm fs-" type="button"> В корзину </button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-product h-100">
                            <img src="{{'main/img/cake1.jpg'}}" class="card-img-top mb-2" alt="...">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="card-cost-social d-flex mb-2">
                                    <h5 class="card-cost fs-4 my-auto pe-3">1500 ₽</h5>
                                    <p class="fs-6 my-auto pe-2"> <i class="fa-solid fa-star"
                                            style="color: #ffd500;"></i> 4.5 </p>
                                    <p class="fs-6 my-auto"> <i class="fa-regular fa-comment"
                                            style="color: #b0b0b0;"></i> 2 </p>
                                </div>
                                <p class="card-title fs-5 mb-3">Наполеон с ягодами
                                    <span class="card-weight fs-5 color-font-pink"> 650 г </span>
                                </p>
                                <button class="btn btn-product shadow-sm fs-" type="button"> В корзину </button>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-product h-100">
                            <img src="{{'main/img/cake2.jpeg'}}" class="card-img-top mb-2" alt="...">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="card-cost-social d-flex mb-2">
                                    <h5 class="card-cost fs-4 my-auto pe-3">1500 ₽</h5>
                                    <p class="fs-6 my-auto pe-2"> <i class="fa-solid fa-star"
                                            style="color: #ffd500;"></i> 4.5 </p>
                                    <p class="fs-6 my-auto"> <i class="fa-regular fa-comment"
                                            style="color: #b0b0b0;"></i> 2 </p>
                                </div>
                                <p class="card-title fs-5 mb-3">Наполеон с ягодами
                                    <span class="card-weight fs-5 color-font-pink"> 650 г </span>
                                </p>
                                <button class="btn btn-product shadow-sm fs-" type="button"> В корзину </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection