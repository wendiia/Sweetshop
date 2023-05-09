@extends('main.layouts.master')

@section('content')

<div class="container p-all-0">
    <!-- Баннер  -->
    <section class="section_category_banner">
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
            <div class="col-12 d-flex align-items-center mb-4">
                <h1 class="display-3 pe-3">Вафли</h1>
                <p class="my-0">найдено: 20</p>
            </div>
        </div>

        <!-- Фильтр товаров -->
        <div class="row">
            <div class="col-3 align-items-center ">
                <button class="my-0 color-font-pink fs-5 btn-none mb-2">Сбросить <img
                        src="{{asset('main/img/clear.png')}}" alt="Сброс" width="20" height="20"></button>
                <h3 class="fw-bold mb-4">Цена</h3>

                <div class="wrapper1 pe-5">
                    <div class="container1">
                        <div class="slider-track"></div>
                        <input type="range" min="0" max="100" value="0" id="slider-1" oninput="slideOne()">
                        <input type="range" min="0" max="100" value="100" id="slider-2" oninput="slideTwo()">
                    </div>

                    <div class="form-row d-flex justify-content-between">
                        <div class="form-group col-md-6 pe-2">
                            <input id="range1" class="form-control my-form-control ps-2 " placeholder="От" type="number">
                        </div>
                        <div class="form-group text-right col-md-6 ps-2">
                            <input id="range2" class="form-control my-form-control ps-2" placeholder="До" type="number">
                        </div>
                    </div>

                    <!-- <div class="">
                        <span id="range1"></span>
                        <span> &dash; </span>
                        <span id="range2"></span>
                    </div> -->
                </div>

            </div>

        </div>

    </section>


    <section></section>
</div>
@endsection