<!-- Фильтр товаров -->
<div class="col-2 pt-3">
    <form method="get">
        <a class="color-font-pink fs-5 btn-none mb-2 p-0 m-0 text-decoration-none" href="{{$currentUrl}}">
            Сбросить
            <img src="{{asset('main/img/clear.png')}}" alt="Сброс" width="15" height="15">
        </a>

        {{--     Фильтр цены    --}}
        <div class="filter-cost">
            <h3 class="fw-bold fs-4 mb-3">Цена</h3>
            <div class="wrapper-range mb-4">
                <div class="container1">
                    <div class="slider-track"></div>
                    <input type="range" min="0" max="{{ $maxPrice / 100 + 1}}"
                           value="{{ $filterData['priceFrom'] ?? '0' }}" id="slider-1" name="priceFrom"
                           oninput="slideOne()">

                    <input type="range" min="0" max="{{ $maxPrice / 100 + 1 }}"
                           value="{{ $filterData['priceTo'] ?? $maxPrice + 1 }}" id="slider-2" name="priceTo"
                           oninput="slideTwo()">
                </div>

                <div class="form-row d-flex justify-content-between">
                    <div class="form-group col-md-6 pe-2">
                        <input id="range1" class="form-control my-form-control ps-2" min="0" placeholder="От"
                               type="number">
                    </div>
                    <div class="form-group text-right col-md-6 ps-2">
                        <input id="range2" class="form-control my-form-control ps-2"  min="0" placeholder="До"
                               type="number">
                    </div>
                </div>
            </div>
        </div>
        {{--     Фильтр размер    --}}
        <div class="filter-size">
            <div class="accordion" id="accordion_size">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button btn-dropdown fs-4" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseSize"
                                aria-expanded="true"
                                aria-controls="collapseSize">
                            Размер
                        </button>
                    </h2>
                    <div id="collapseSize" class="accordion-collapse collapse show"
                         data-bs-parent="#accordion_size">
                        <div class="accordion-body ps-0 fs-5">
                            @foreach ($sizes as $size)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $size->id }}"
                                           id="flexCheckDefault"
                                           name="sizes[]" {{ isset($filterData['sizes']) && in_array($size->id, $filterData['sizes']) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $size->name }}
                                    </label>
                                </div>
                            @endforeach
                            {{--                        ошибка на массив--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--     Фильтр ингредиенты    --}}
        <div class="filter-ingredients mb-2">
            <div class="accordion" id="accordion_ingredients">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button btn-dropdown fs-4" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseIngredients"
                                aria-expanded="true"
                                aria-controls="collapseIngredients">
                            Ингредиенты
                        </button>
                    </h2>
                    <div id="collapseIngredients" class="accordion-collapse collapse show"
                         data-bs-parent="#accordion_ingredients">
                        <div class="accordion-body ps-0 fs-5">
                            @foreach ($specialIngredients as $specialIngredient)
                                <div class="form-check {{$loop->index > 3 ? 'check-status': ''}}">
                                    <input class="form-check-input" type="checkbox" value="{{ $specialIngredient->id }}"
                                           id="flexCheckDefault"
                                           name="specialIngredients[]" {{ isset($filterData['specialIngredients']) && in_array($specialIngredient->id, $filterData['specialIngredients']) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $specialIngredient->name }}
                                    </label>
                                </div>
                            @endforeach

                            <button id="btnShowAll" type="button" class="btn-none color-font-pink px-0" onclick="showAll()">Показать все</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" name="sort" value="{{$filterData['sort'] ?? 'none' }}"/>

        <button type="submit" class="btn btn-primary mx-0">Применить</button>
    </form>
</div>
