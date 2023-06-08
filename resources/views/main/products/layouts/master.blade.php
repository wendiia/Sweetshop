@extends('main.layouts.master')

@section('content')
    <div class="container container-margin">

        @yield('products_banner')

        <section class="section_products py-0">

            @include('main.products.layouts.errors')

            <!-- Крошки -->
            <div class="row breadcrumbs">
                <nav
                    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Главная</a></li>
                        @yield('products_breadcrumbs')
                    </ol>
                </nav>
            </div>

            <!-- Название каталога -->
            <div class="row">
                <div class="col-12 d-flex align-items-center mb-2">
                    @yield('products_title')
                    <p class="my-0 fs-6">найдено: {{$products->total()}}</p>
                </div>
            </div>

            <div class="row">
                @include('main.products.layouts.filters')
                @include('main.products.layouts.product_cards')
            </div>
        </section>
    </div>
@endsection

@section('custom_script')
    <script src="{{asset('main/js/products.js')}}?v=<?=time()?>"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
{{--    <script>--}}

{{--        $(document).ready(function () {--}}
{{--            $('.btn-product').click(function () {--}}
{{--                addToCart(this.id)--}}
{{--            })--}}
{{--        })--}}

{{--        function addToCart(product_id) {--}}
{{--            $.ajax({--}}
{{--                url: "{{route('cart.addToCart')}}",--}}
{{--                type: "POST",--}}
{{--                data: {--}}
{{--                    product_id: product_id--}}
{{--                },--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                },--}}
{{--                success: (data) => {--}}
{{--                    console.log(data)--}}
{{--                },--}}
{{--            })--}}
{{--        }--}}
{{--    </script>--}}

@endsection

