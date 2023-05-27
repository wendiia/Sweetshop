@extends('main.layouts.head')


{{--@php--}}

{{--$users = \App\Models\User::all();--}}

{{--dump($users[1]->cart);--}}

{{--@endphp--}}


{{--    <select id="select-sort-products" class="form-select my-form-select ms-4 " aria-label="Default select example">--}}
{{--        <option selected disabled hidden>Выберите</option>--}}
{{--        <option value="new" data-href="{{route('index')}}">Новинки</option>--}}
{{--        <option value="cheapFirst">Дешевые</option>--}}
{{--        <option value="expensiveFirst">Дорогие</option>--}}
{{--    </select>--}}

<div class="container">
    <div class="row justify-content-center" style="background: #e2e9ea">
        <div class="col-12">
            <p class="text-center display-3">This is testing!</p>


{{--               Связь sizes -> products          --}}
            @foreach($sizes as $size)
                <h2 class="text-center"> Размер: {{$size->id . " " . $size->name}} </h2>
                <ul style="padding-left: 0;list-style-position: inside;">
                    @foreach($size->products as $product)
                        <li class="text-center"> {{$product->title}} </li>
                        <img class="d-block mx-auto" src="{{$product->photo}}" alt="">
                    @endforeach
                </ul>
                <hr>
            @endforeach

{{--               Связь categories -> products          --}}
{{--            @foreach($categories  as $category)--}}
{{--                <h2 class="text-center"> Категория: {{$category->id . " " . $category->title}} </h2>--}}
{{--                <ul style="padding-left: 0;list-style-position: inside;">--}}
{{--                    @foreach($category->products as $product)--}}
{{--                        <li class="text-center"> Продукт {{$product->title}} </li>--}}
{{--                        <img class="d-block mx-auto" src="{{$product->photo}}" alt="">--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--                <hr>--}}
{{--            @endforeach--}}

{{--               Связь users -> carts &    users -> orders      --}}
{{--            @foreach($users as $user)--}}
{{--                <h2 class="text-center"> Пользователь:  {{$user->id . " " . $user->first_name . " " . $user->last_name}} </h2>--}}
{{--                <h3 class="text-center"> Товаров в корзине: {{$user->cart->quantity}} </h3>--}}
{{--                <ul style="padding-left: 0;list-style-position: inside;">--}}
{{--                    @foreach($user->orders as $order)--}}
{{--                        <li class="text-center"> Заказ № {{$order->id}} </li>--}}
{{--                        <p  class="text-center">Количество товаров в заказе: {{$order->quantity}}</p>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--                <hr>--}}
{{--            @endforeach--}}

        </div>
    </div>
</div>

