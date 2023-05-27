<!-- Продукция -->
<div class="col-10 test pt-2">
    <select id="select-sort-products" class="form-select my-form-select ms-4 " aria-label="Default select example">
        <option selected disabled hidden>Выберите</option>
        <option value="new">Новинки</option>
        <option value="cheapFirst">Дешевые</option>
        <option value="expensiveFirst">Дорогие</option>
    </select>

    <hr class="hr-line">

    <div class="product-cards">
        <div class="row row-cols-1 row-cols-md-3 px-4 g-4 mb-5 ">
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

        <div class="row justify-content-end">
            <div class="col-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>


</div>
