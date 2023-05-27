@extends('main.products.layouts.master')

@section('products_breadcrumbs')
    <li class="breadcrumb-item active" aria-current="page">Продукция</li>
@endsection

@section('products_title')
    <h1 class="display-5 pe-3"> Вся продукция </h1>
@endsection

@section('products_route')
    console.log("all products");
@endsection
