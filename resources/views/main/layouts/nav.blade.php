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
                    <a class="nav-link py-0" href="{{route('products')}}">Продукция</a>
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
                        <li><a class="dropdown-item" href="{{route('cakes')}}">Торты</a></li>  {{-- проси roducts/cake--}}
                        <li><a class="dropdown-item" href="{{route('waffles')}}">Вафли</a></li>
                        <li><a class="dropdown-item" href="{{route('cookies')}}">Маффины, печенье</a></li>
                    </ul>
                </div>

                <form class="d-flex " role="search">
                    <input class="form-control me-2 form-search" type="search" placeholder="Найти..."
                        aria-label="Search">
                    <button class="btn btn-outline-success me-3" type="submit"> <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i> </button>
                </form>
            </div>

            <div class="d-flex justify-content-center align-items-center">
                <a href="{{route('profile')}}"><img src="{{asset('main/img/user1.png')}}" width="30" height="30"
                        class="me-2" alt="Cart"></a>
                <a href="{{route('cart')}}"><img src="{{asset('main/img/cart1.png')}}" width="30" height="30" class="me-2"
                        alt="Cart"></a>
            </div>
        </nav>

    </div>
</header>
