<header class="shadow-sm sticky-top">
    {{-- Верхний навбар   --}}
    <div class="container-fluid d-flex justify-content-center">
        <nav class="navbar  navbar-expand-lg bg-body-tertiary d-flex justify-content-between">
            <a class="py-0 pe-2" href="{{route('index')}}">
                <img src="{{asset('main/img/logo-grey.png')}}" alt="Logo" width="100" height="50"
                     class="d-inline-block align-text-top">
            </a>

            <nav class="navbar navbar-light navbar-expand-sm bg-body-tertiary ">
                <div class="navbar-nav">
                    <a class="nav-link py-0" aria-current="page" href="{{route('index')}}">Главная</a>
                    <a class="nav-link py-0" href="{{route('products.index')}}">Продукция</a>
                    <a class="nav-link py-0" href="{{route('about')}}">О компании</a>
                </div>
            </nav>

            <div class="d-flex">
                <div class="dropdown d-flex justify-content-center align-center">
                    <a class="btn btn-secondary dropdown-toggle me-2" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <img src="{{asset('main/img/i-menu.png')}}" width="30" height="30" class="" alt="Cart">
                    </a>

                    <ul class="dropdown-menu">
                        @foreach($categories as $category)
                            <li><a class="dropdown-item"
                                   href="{{route('categories.show', $category->slug)}}"> {{$category->title}} </a></li>
                        @endforeach
                        <li><a class="dropdown-item" href="{{route('categories.index')}}"> Все категории </a></li>
                    </ul>
                </div>

                <form class="d-flex " role="search">
                    <input class="form-control me-2 form-search" type="search" placeholder="Найти..."
                           aria-label="Search">
                    <button class="btn btn-outline-success me-3" type="submit"><i class="fa-solid fa-magnifying-glass"
                                                                                  style="color: #ffffff;"></i></button>
                </form>
            </div>

            <div class="d-flex justify-content-center align-items-center">

                @auth
                    <form method="POST" action="{{route('login.destroy')}}">
                        @csrf
                        <button class="color-font-pink fs-5 btn-none" type="submit"> Выйти</button>
                    </form>

                    <a class="a-nav" href="{{route('profile')}}"><img src="{{asset('main/img/user1.png')}}" width="35"
                                                                      height="35"
                                                                      class="me-2" alt="Cart"></a>
                @else
                    <a class="text-decoration-none color-font-pink fs-5 pe-3" href="{{route('login.create')}}">
                        Войти
                    </a>
                    <a class="text-decoration-none color-font-pink fs-5 pe-3" href="{{route('register.create')}}">
                        Регистрация
                    </a>
                @endauth

                <a class="a-nav text-decoration-none position-relative" href="{{route('cart.index')}}">


                    <div class="cart-nav-counter {{ !empty($cartProductsCount) ? 'd-block' : 'd-none' }} d-flex justify-content-center align-items-center">
                        <p class=""> {{ !empty($cartProductsCount) ?? $cartProductsCount}} </p>
                    </div>
                    <img src="{{asset('main/img/cart1.png')}}" width="35" height="35" class="me-2" alt="Cart">
                </a>
            </div>
        </nav>
    </div>
</header>

{{--@section('custom_script')--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('.btn-product-add').click(function () {--}}
{{--                if ($('.btn-product-add').text() === "К корзине") {--}}
{{--                    location.href = "{{route('cart.index')}}"--}}
{{--                    return;--}}
{{--                }--}}
{{--                addToCart(this.id);--}}
{{--            })--}}
{{--        })--}}

{{--        function addToCart(product_id) {--}}
{{--            $.ajax({--}}
{{--                url: "{{route('cart.addToCart')}}",--}}
{{--                type: "POST",--}}
{{--                data: {--}}
{{--                    product_id: product_id,--}}
{{--                    quantity: 1,--}}
{{--                },--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                },--}}
{{--                success: () => {--}}
{{--                    let btnCartProduct = $(".btn-product-add");--}}
{{--                    btnCartProduct.text("К корзине");--}}
{{--                    btnCartProduct.toggleClass("btn-cart-product-active");--}}
{{--                    flushMessage("Товар был успешно добавлен в корзину!");--}}
{{--                },--}}
{{--            })--}}
{{--        }--}}
{{--        --}}
{{--    </script>--}}
{{--@endsection--}}
