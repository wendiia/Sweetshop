@extends('main.layouts.master')

@section('content')

    <div class="container main">
        <div class="row breadcrumbs">
            <nav
                style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Категории</li>
                </ol>
            </nav>
        </div>
        <div>
            <h1 class="display-5 mb-5">Все категории</h1>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col">
                        <a href="{{route('categories.show', ['category' => $category->slug])}}"
                           class="color-font-pink text-decoration-none fs-4"> {{$category->title}} </a>
                    </div>
                @endforeach

                <div class="col">
                    <a href="{{route('products.index')}}"
                       class="color-font-pink text-decoration-none fs-4"> Вся продукция </a>
                </div>
            </div>
        </div>
    </div>
@endsection
