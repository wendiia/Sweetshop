<header class="shadow-sm sticky-top">
    {{-- Верхний навбар   --}}
    <div class="container-fluid d-flex justify-content-center">
        <nav class="navbar  navbar-expand-lg bg-body-tertiary d-flex justify-content-between">
            <a class="py-0 pe-2" href="{{route('index')}}">
                <img src="{{asset('main/img/logo-cake.svg')}}" alt="Logo" width="50" height="50"
                     class="d-inline-block align-text-top">
            </a>



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

            <nav class="navbar navbar-light navbar-expand-sm bg-body-tertiary  mx-5">
                <div class="navbar-nav">
                    <a class="nav-link py-0 fs-5" aria-current="page" href="{{route('index')}}">Главная</a>
                    <a class="nav-link py-0 fs-5" href="{{route('products.index')}}">Продукция</a>
                    <a class="nav-link py-0 fs-5" href="{{route('about')}}">О компании</a>
                </div>
            </nav>

            <div class="d-flex">


{{--                <form class="d-flex " role="search">--}}
{{--                    <input class="form-control me-2 form-search" type="search" placeholder="Найти..."--}}
{{--                           aria-label="Search">--}}
{{--                    <button class="btn btn-outline-success me-3" type="submit"><i class="fa-solid fa-magnifying-glass"--}}
{{--                                                                                  style="color: #ffffff;"></i></button>--}}
{{--                </form>--}}
            </div>

            <div class="d-flex justify-content-center align-items-center">



                <a class="a-nav text-decoration-none position-relative" href="{{route('cart.index')}}">
                    <div class="cart-nav-counter d-flex justify-content-center align-items-center">
                        <p id="cart-count-p"> {{$cartProductsCount}} </p>
                    </div>
                    <img src="{{asset('main/img/cart1.png')}}" width="35" height="35" class="me-2" alt="Cart">
                </a>


                @auth
                    <form method="POST" action="{{route('login.destroy')}}">
                        @csrf
                        <button class="color-font-pink fs-5 btn-none" type="submit"> Выйти</button>
                    </form>

                    <a class="a-nav" href="{{route('profile.index')}}"><img src="{{asset('main/img/user1.png')}}" width="30"
                                                                            height="30"
                                                                            class="me-2" alt="Cart"></a>
                @else
                    <a class="text-decoration-none color-font-pink fs-6 pe-1 ps-3" href="{{route('login.create')}}">
                        Войти /
                    </a>
                    <a class="text-decoration-none color-font-pink fs-6 pe-3" href="{{route('register.create')}}">
                        Регистрация
                    </a>
                @endauth

            </div>
        </nav>
    </div>
</header>

