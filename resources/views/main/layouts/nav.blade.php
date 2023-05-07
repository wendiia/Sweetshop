<header class="shadow-sm sticky-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-light navbar-expand-lg bg-body-tertiary ">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <img src="{{asset('main/img/logo.png')}}" alt="Logo" width="90" height="40"
                                 class="d-inline-block align-text-top">
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Переключатель навигации">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <div class="collapse navbar-collapse d-flex justify-content-center"
                                 id="navbarNavAltMarkup">
                                <div class="navbar-nav">
                                    <a class="nav-link text-uppercase" href="#"><i class="fa fa-search pe-2" aria-hidden="true"></i></a>
                                    <a class="nav-link text-uppercase" aria-current="page" href="{{route('index')}}">Главная</a>
                                    <a class="nav-link text-uppercase" href="{{route('products')}}">Продукция</a>
                                    <a class="nav-link text-uppercase" href="#">О нас</a>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center align-items-center">
                                <button class="btn py-0 me-md-2" type="button">
                                    <img src="{{asset('main/img/user.png')}}" width="20" height="20" class="me-2"
                                         alt="Cart"> Войти
                                </button>

                                <button class="btn py-0 me-md-2" type="button">
                                    <img src="{{asset('main/img/cart.png')}}" width="20" height="20" class="me-2"
                                         alt="Cart"> Корзина
                                </button>

                            </div>

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
