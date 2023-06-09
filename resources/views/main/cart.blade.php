@extends('main.layouts.master')

@section('content')
    <section>
        <div class="container ">

            <!-- Модальное окно -->
            <div class="modal fade" id="ModalConfirmOrder" tabindex="-1" aria-labelledby="ModalConfirmOrder"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-confirm-order">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalConfirmOrder">Оформление заказа</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            <h5 class="fs-5 my-auto text-center">
                                Оформление прошло успешно, спасибо вам за заказ! <br> Вся информация будет отправлена на
                                почту, когда заказ будет готов, мы с вами свяжемся.
                            </h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Крошки -->
            <div class="row breadcrumbs mb-3">
                <nav
                    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Главная</a></li>
                        <li class="breadcrumb-item">Корзина</li>
                    </ol>
                </nav>
            </div>

            <div class="row mb-3">
                <div class="d-flex">
                    <h1 class="display-5 pe-1">Корзина</h1>
                    <p class="fs-4"> {{$cart->quantity ?? 0}} </p>
                </div>
            </div>

            @guest
                <div class="row">
                    <div class="col">
                        <div class="bg-white my-rounded px-4 mb-4 py-3 d-flex justify-content-between align-center ">
                            <p class="fs-6 my-auto">
                                <i class="fa-solid fa-circle-exclamation fa-xl pe-3" style="color: #fc9093;"></i>
                                Авторизуйтесь или зарегистрируйтесь, чтобы оформить заказ
                            </p>
                            <a class="btn shadow-sm fs-6 px-5 py-1" href="{{route('login.store')}}"> Войти </a>
                        </div>
                    </div>
                </div>
            @endguest

            @if (isset($products))
                <div class="row mb-3">
                    <div class="col-3">
                        <button id="cartDeleteAll" class="color-font-pink fs-5 btn-none">Удалить все товары</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="bg-white my-rounded p-4 cart-products">

                            @foreach($products as $product)
                                <div id="cart-product-{{$product->id}}" class="position-relative">

                                    <div class="position-absolute cart-product-counter">
                                        <div class="btns-count d-flex">
                                            <button class="btn my-auto me-2"><i class="fa-solid fa-minus fa-xs"
                                                                                style="color: #ffffff;"></i>
                                            </button>
                                            <p class="fs-6 my-auto me-2"> {{$product->pivot->quantity}} шт. </p>
                                            <button class="btn my-auto"><i class="fa-solid fa-plus fa-xs"
                                                                           style="color: #ffffff;"></i>
                                            </button>
                                        </div>

                                        <p class="fs-6 quantity-cost"> шт. {{$product->price / 100}} ₽ </p>
                                    </div>

                                    <div class="cart-item d-flex justify-content-between align-items-center">

                                        <div class="d-flex">
                                            <a href="#"> <img src="{{asset($product->photo)}}"
                                                              class="img-fluid rounded-3 cart-img me-3" style=""
                                                              alt="Товар в корзине"></a>
                                            <div class="d-flex flex-column justify-content-center cart-desc">
                                                <a href="#" class="text-decoration-none color-font-grey"><p
                                                        class="fs-5 fw-bold"> {{$product->title}} </p></a>
                                                <p class="fs-6 color-font-pink"> {{$product->weight}} г</p>
                                                <p class="fs-6"> Категория: {{$product->category->title}} </p>

                                                <button id="{{$product->id}}" class="color-font-pink fs-6 btn-none me-auto p-0 btn-cart-del">Удалить</button>
                                            </div>
                                        </div>
                                        <h5 class="color-font-pink fs-5 my-auto fw-bold"> {{$product->price / 100 * $product->pivot->quantity}} ₽</h5>
                                    </div>

                                    <hr class="hr-line mx-5">
                                </div>
                            @endforeach

                        </div>
                    </div>


                    <div class="col-4">
                        <div class="bg-white my-rounded p-4">
                            <h1 class="fs-4 text-center mb-4 fw-bold">Оставить заявку</h1>
                            <form>
                                <div class="mb-3">
                                    <label class="fs-5 pt-0 ps-1" for="date_input"> Желаемая дата выдачи: </label>
                                    <input type="date" class="form-control my-form-control mb-3" id="date_input" @guest disabled @endguest>
                                </div>

                                <p class="fs-6 my-auto text-center mb-2">
                                    Вся информация будет отправлена на почту, когда заказ будет готов, мы с вами свяжемся!
                                </p>

                                <div class="d-flex justify-content-between mb-2">
                                    <p class="fs-4 fw-bold my-auto">Общая стоимость:</p>
                                    <p class="fs-3 color-font-pink fw-bold my-auto "> {{$cart->amount / 100}} ₽</p>
                                </div>

                                <button type="button" class="btn w-100" data-bs-toggle="modal"
                                        data-bs-target="#ModalConfirmOrder" @guest disabled @endguest>
                                    Оформить заказ
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            @else
                <div class="row">
                    <div class="col">
                        <div class="bg-white my-rounded px-4 mb-4 py-3 d-flex justify-content-between align-center ">
                            <p class="fs-4 my-auto">
                                {{$emptyCart}}
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <div class="flash-success"></div>

@endsection

@section('custom_script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>

        $(document).ready(function () {
            $('#cartDeleteAll').click(function () {
                DeleteAll()
            })

            $('.btn-cart-del').click(function () {
                ProductDelete(this.id)
            })
        })

        function ProductDelete(product_id) {
            $.ajax({
                url: "{{route('cart.deleteProduct')}}",
                type: "POST",
                data: {
                    product_id: product_id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: (data) => {
                    // $("#cart-product-" + product_id).hide()
                    flushMessage("Товар удален")
                },
            })
        }

        function DeleteAll() {
            $.ajax({
                url: "{{route('cart.deleteAllCart')}}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: () => {
                    $(".cart-products").hide()
                    flushMessage("Корзина очищена!")
                },
            })
        }

        function flushMessage (message) {
            $(".flash-success").html(
                `<div x-data="{show: true}" x-init="setTimeout(() => show = false, 4000)" x-show="show"
                    class="row justify-content-end me-2 toast-fixed">
                    <div class="col-3 shadow-lg bg-white my-rounded  mb-4 py-3 d-flex align-center">
                        <p class="fs-5 mx-auto color-font-pink my-auto">
                            ${message}
                        </p>
                    </div>
                </div>`
            )
        }

    </script>
@endsection
