@extends('main.products.layouts.master')

@section('products_banner')
    <section class="section_category_banner pb-5">
        <div class="row">
            <img src="{{asset($category->photo)}}" class="img-fluid " alt="Фото">
        </div>
    </section>
@endsection

@section('products_breadcrumbs')
    <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Категории</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$category->title}}</li>
@endsection

@section('products_title')
    <h1 class="display-5 pe-3"> {{$category->title}}</h1>
@endsection

