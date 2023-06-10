<!-- Продукция -->
<div class="col-10 test pt-2">

    <div class="d-flex ms-3">
        <a class="color-font-pink fs-5 text-decoration-none mx-2"
           href="{{route(Route::currentRouteName(), array_merge($filterData, array('sort' => 'none', $category->slug ?? null)))}}">
            Без сортировки </a>
        <a class="color-font-pink fs-5 text-decoration-none mx-2"
           href="{{route(Route::currentRouteName(), array_merge($filterData, array('sort' => 'created_at.asc', $category->slug ?? null)))}}">
            Новинки </a>
        <a class="color-font-pink fs-5 text-decoration-none mx-2"
           href="{{route(Route::currentRouteName(), array_merge($filterData, array('sort' => 'price.asc', $category->slug ?? null)))}}">
            Дешевле</a>
        <a class="color-font-pink fs-5 text-decoration-none mx-2"
           href="{{route(Route::currentRouteName(), array_merge($filterData, array('sort' => 'price.desc', $category->slug ?? null)))}}">
            Дороже </a>
    </div>

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


                            <div class="d-flex">
                                <input id="input-quantity-{{$product->id}}" value="1" name="quantity" min="1"
                                       class="form-control product-quantity" placeholder="0" type="number">
                                <button type="submit" id="{{$product->id}}" class="btn btn-product">В корзину</button>
                            </div>
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
