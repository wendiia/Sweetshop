@extends('main.layouts.master')

@section('content')

<div class="container ">
    <!-- Товар -->
    <section class="">
        <!-- Крошки -->
        <div class="row breadcrumbs mb-3">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Главная</a></li>
                    <li class="breadcrumb-item"><a href="{{route('categories.show', $product->category->slug)}}"> {{$product->category->title}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
                </ol>
            </nav>
        </div>


        <div class="row g-5">
            <div class="col-6">
                <img src="{{asset($product->photo)}}" class="img-fluid my-rounded img-product" alt="Торт товар">
                <h3 class="fw-bold fs-4 mb-4">Состав и пищевая ценность</h3>
                <p class="fs-5 color-font-pink"> {{$product->product_value}} </p>
                <p class="fs-5">
                    {{$product->ingredients}}
                </p>
            </div>
            <div class="col-6">
                <div class="d-flex mb-4">
                    <p class="display-5 my-auto pe-2"> {{$product->title}} </p>
                    <p class="fs-4 color-font-pink my-auto pe-4"> {{$product->weight}} г</p>

                    <p class="fs-5 my-auto pe-3"> <i class="fa-solid fa-star" style="color: #ffd500;"></i> 4.5 </p>
                    <p class="fs-5 my-auto"> <i class="fa-regular fa-comment" style="color: #b0b0b0;"></i> 2 </p>
                </div>
                <div class="d-flex">
                    <h5 class="card-cost fs-2 my-auto fw-bold me-5"> {{$product->price / 100}} ₽</h5>
                    <button class="btn shadow-sm px-5 fs-4" type="button"> В корзину </button>
                </div>

                <hr class="hr-line ">

                <div class="">
                    <h3 class="fw-bold fs-4 mb-4"> Описание товара </h3>
                    <p class="fs-5">
                        {{$product->description}}
                    </p>
                </div>

                <hr class="hr-line ">

                <div class="fs-5">
                    <h3 class="fw-bold fs-4 mb-4"> Характеристика </h3>

                    <ul class="leaders mb-2">
                        <li><span>Размер</span><span> {{$product->size->name}} </span>
                        <li><span>Срок годности товара</span><span> {{ round($product->expiration_date / 24) }} дней ({{$product->expiration_date}} часов) </span>
                        <li><span>Витрина</span><span> {{$product->category->title}} </span>
                        <li><span>Вес</span><span> {{$product->weight}} г</span>
                    </ul>
                    <p class="mb-0 fw-bold">Особые ингредиенты: </p>
                    <ul class="px-4">

                        @foreach($product->special_ingredients as $ingredient)
                            <li>{{$ingredient->name}}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection
