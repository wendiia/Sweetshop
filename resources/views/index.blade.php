@extends('main.layouts.master')

@section('content')

    @if(!$banners->isEmpty())
        <!-- Слайдер -->
        <section class="section_slider">
            <div id="carouselExampleDark" class="carousel carousel-dark slide">
                <div class="carousel-indicators">
                    @foreach($banners as $banner)
                        <button type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide-to="{{$banner->id - 1}}" class="{{ $banner->id == 1  ? 'active' : '' }}"
                                aria-current="true" aria-label="Slide {{$banner->id - 1}}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner">

                    @foreach($banners as $banner)
                        <div class="carousel-item {{ $banner->id == 1 ? 'active' : '' }}" data-bs-interval="10000">
                            <img src="{{asset($banner->photo)}}" class="d-block slider-img img-fluid"
                                 alt="Слайдер моти">
                            <div class="slider-desc">
                                <div class="d-flex align-items-center">
                                    <div class="line-discount "></div>
                                    <div class="discount "> {{ $banner->discount }} </div>
                                </div>
                                <h1 class="text-uppercase  my-3 display-2 slider-title "> {{ $banner->title }} </h1>
                                <p class="slider-subtitle "> {{ $banner->description }} </p>
                                <a class="btn btn-slider" href="{{route('products.index')}}"> Продукция </a>
                            </div>
                        </div>
                    @endforeach

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>
            </div>
        </section>
    @else
        {{--  Если нет баннеров --}}
        <div class="bg-image-banner-default">
            <div class="d-flex text-center justify-content-center align-items-center h-100"
                 style="flex-direction: column">
                <h3 class="text-white">Заказав один раз, захочется еще...</h3>
                <h1 class="text-white fw-bold display-1 mb-5">Мини-кондитерская "Еще кусочек"</h1>
                <a class="btn btn-order" href="{{route('products.index')}}"> Наша продукция </a>
            </div>
        </div>
    @endif

    <!-- Преимущества -->
    <section class="section_services">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-sm-12">
                    <h2 class="display-5 text-uppercase section-header">Преимущества</h2>
                    <div class="line-section-header mx-auto"></div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xl-3 col-md-6 col-sm-12 mb-3 card_service">
                    <div class="service_circle d-flex justify-content-center align-items-center mx-auto my-2"><img
                            src="{{asset('main/img/money.png')}}" width="40" height="40" alt="Cart"></div>
                    <h5 class="text-center mx-auto">Доступные цены</h5>
                    <p class="text-center mx-auto">Мы стремимся продавать продукцию по средним и низким ценам</p>
                </div>

                <div class="col-xl-3 col-md-6 col-sm-12 mb-3 card_service">
                    <div class="service_circle d-flex justify-content-center align-items-center mx-auto my-2"><img
                            src="{{asset('main/img/choice.png')}}" width="40" height="40" alt="Cart"></div>
                    <h5 class="text-center mx-auto">Широкий ассортимент</h5>
                    <p class="text-center mx-auto">От простых кексов до изысканных эксклюзивных тортов</p>
                </div>

                <div class="col-xl-3 col-md-6 col-sm-12 mb-3 card_service">
                    <div class="service_circle d-flex justify-content-center align-items-center mx-auto my-2"><img
                            src="{{asset('main/img/thumbs-up.png')}}" width="40" height="40" alt="Cart"></div>
                    <h5 class="text-center mx-auto">Качественная продукция</h5>
                    <p class="text-center mx-auto">100% натуральный продукт с использованием свежих ингредиентов</p>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12 mb-3 card_service">
                    <div class="service_circle d-flex justify-content-center align-items-center mx-auto my-2"><img
                            src="{{asset('main/img/confectioner.png')}}" width="40" height="40" alt="Cart"></div>
                    <h5 class="text-center mx-auto">Опытные кондитеры</h5>
                    <p class="text-center mx-auto">Опытные мастера с навыками и непревзойденным талантом</p>
                </div>
            </div>
        </div>
    </section>

    <!-- О нас -->
    <section class="section_about">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-sm-12">
                    <h2 class="display-5 text-uppercase section-header">О нас</h2>
                    <div class="line-section-header mx-auto"></div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-xl-6 my-auto me-5">
                    <p class="about-subtitle color-font-pink">Только натуральная продукция</p>
                    <p>Все люди хоть немного, но сладкоежки, каждый порой балует себя лакомствами, а чтобы отказать себе
                        в сладостях, особенно по случаю какого-либо праздника, нужно обладать поистине стоическим
                        характером. Мы же не призываем Вас отказываться от лакомств, а наоборот - предлагаем Вам обилие
                        тортов и изготовление тортов на заказ.
                    </p>
                    <p class="">В качестве основного сырья для приготовления кондитерских изделий используются следующие
                        виды продуктов: мука (пшеничная, реже кукурузная, рисовая, овсяная и др.), сахар, мёд, фрукты и
                        ягоды, молоко и сливки, жиры, яйца, дрожжи, крахмал, какао, орехи, пищевые кислоты, желирующие
                        вещества, вкусовые и
                        ароматические добавки, пищевые красители и разрыхлители.</p>

                </div>
                <div class="col s_cake_about shadow-sm ">
                    <h1 class="display-4 text-center color-font-pink fw-bold">Торты</h1>
                    <img src="{{asset('main/img/cake-about.png')}}" class="img-cake-about mx-auto d-block my-4"
                         alt="Торт">
                    <div class="d-flex justify-content-center pt-5">
                        <button class="btn btn-about rounded-circle ms-4" type="button"><img
                                src="{{asset('main/img/i-cake.png')}}" width="45" height="45" alt="Торт"></button>
                        <button class="btn btn-about rounded-circle ms-4" type="button"><img
                                src="{{asset('main/img/i-waffle.png')}}" width="45" height="45" alt="Вафля"></button>
                        <button class="btn btn-about rounded-circle ms-4" type="button"><img
                                src="{{asset('main/img/i-muffin.png')}}" width="45" height="45" alt="Маффин"></button>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Оставвить заявку -->
    <section class="section_order">
        <div class="container-fluid ">
            <div class="row">
                <div class="bg-image">
                    <div class="d-flex text-center justify-content-center align-items-center h-100"
                         style="flex-direction: column">
                        <h3 class="text-white">С нами вы сможете реализовать любые кондитерские пожелания</h3>
                        <h1 class="text-white display-1 mb-5">Узнайте о нас побольше</h1>
                        <a class="btn btn-order" href="{{route('about')}}"> О компании </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Продукция -->

    <section class="section_products pt-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-sm-12">
                    <h2 class="display-5 text-uppercase section-header">Наша продукция</h2>
                    <div class="line-section-header mx-auto"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="d-flex justify-content-center pt-5 mb-5">
                        <button onclick="ShowCakes()" class="btn btn-products shadow-sm" type="button"><img
                                src="{{asset('main/img/i-cake.png')}}" width="30" height="30" class="me-2" alt="Торт">
                            Торты
                        </button>
                        <button class="btn btn-products ms-4 shadow-sm" type="button"><img
                                src="{{asset('main/img/i-waffle.png')}}" width="30" height="30" class="me-2"
                                alt="Вафля">
                            Вафли
                        </button>
                        <button class="btn btn-products ms-4 shadow-sm" type="button"><img
                                src="{{asset('main/img/i-muffin.png')}}" width="30" height="30" class="me-2" alt="Кекс">
                            Кексы
                        </button>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-4  index-products">
                @foreach($products as $product)
                    <div class="col">
                        <div class="card card-product h-100">
                            <a href="{{route('products.show', $product->slug)}}"> <img src="{{asset($product->photo)}}"
                                                                                       class="card-img-top"
                                                                                       alt="..."> </a>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="card-cost-social d-flex mb-2">
                                    <h5 class="card-cost fs-4 my-auto pe-3 fw-bold"> {{$product->title}} </h5>
                                    <p class="fs-6 my-auto pe-2"><i class="fa-solid fa-star"
                                                                    style="color: #ffd500;"></i> 4.5 </p>
                                    <p class="fs-6 my-auto"><i class="fa-regular fa-comment"
                                                               style="color: #b0b0b0;"></i> 2 </p>
                                </div>
                                <p class="card-title fs-4 mb-3"> {{$product->price / 100}} ₽
                                    <span
                                        class="card-weight fs-5 color-font-pink"> {{$product->weight}} г </span>
                                </p>
                                <button class="btn btn-product shadow-sm fs-" type="button"> В корзину</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-xl-12 d-flex align-items-center justify-content-center mt-5">
                    <a class="btn btn-all-products shadow-sm" href="{{route('products.index')}}"> Вся продукция </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Рагестрация -->
    <section class="section_registration bg-white">
        <div class="container-fluid ">
            <div class="row">
                <div class="d-flex text-center justify-content-center align-items-center"
                     style="flex-direction: column">
                    <h1 class="display-3 mb-5"> Мы будем рады новому клиенту</h1>
                    <button class="btn btn-registration" type="button"> Регистрация</button>
                </div>
            </div>
        </div>
    </section>

    <x-flash/>

@endsection


