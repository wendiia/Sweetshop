@extends('main.layouts.master')

@section('content')

<div class="container container_product">
    <!-- Товар -->
    <section class="">
        <!-- Крошки -->
        <div class="row breadcrumbs mb-4">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Главная</a></li>
                    <li class="breadcrumb-item"><a href="#">Торты</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#">Наполеон</a></li>
                </ol>
            </nav>
        </div>


        <div class="row">
            <div class="col-6">
                <img src="{{asset('main/img/product.png')}}" class="img-fluid img-product mb-5" alt="Торт товар">
                <h3 class="fw-bold fs-4 mb-4">Состав и пищевая ценность</h3>
                <p class="fs-5 color-font-pink"> Белки - 6,5 г; жиры - 29,4 г; углеводы - 54,0 г., 507 ккал/2124 кДж.
                </p>
                <p class="fs-5">Сахар, масло сливочное (13%) (сливки пастеризованные), яйцо куриное пищевое, мука
                    пшеничная в/с,
                    молоко цельное сгущенное с сахаром (12%) (нормализованное молоко, сахар (сахароза, лактоза)), вода
                    очищенная, сметана (сливки, закваска), ядра арахиса (5%), шоколад белый (сахар, масло какао, молоко
                    сухое цельное, сыворотка молочная сухая, эмульгатор соевый лецитин, ароматизатор экстракт ванили
                    натуральный), молоко питьевое, какао-порошок, коньяк (дистилляты коньячные, выдержанные в контакте с
                    древесиной дуба не менее трех лет, вода питьевая, сахарный сироп, краситель сахарный колер I
                    простой), крахмал картофельный, ядра кешью, патока, ликёр (вода питьевая исправленная, сахарный
                    сироп, спирт этиловый ректификованный из пищевого сырья «Люкс», настой миндаля, ароматизаторы,
                    настой полыни, краситель Е150d, настой пажитника), разрыхлитель сода пищевая (гидрокарбонат натрия),
                    ароматизатор экстракт ванили натуральный, консервант сорбиновая кислота, красители натуральные:
                    бета-каротин, кармины. Произведено на предприятии, на котором также выпускаются продукты, содержащие
                    кунжут.</p>
            </div>
            <div class="col-6">
                <div class="d-flex mb-2 ">
                    <h5 class="display-5 my-auto pe-4">Наполеон</h5>
                    <p class="fs-5 my-auto pe-3"> <i class="fa-solid fa-star" style="color: #ffd500;"></i> 4.5 </p>
                    <p class="fs-5 my-auto"> <i class="fa-regular fa-comment" style="color: #b0b0b0;"></i> 2 </p>
                </div>
            </div>
        </div>


    </section>
</div>
@endsection