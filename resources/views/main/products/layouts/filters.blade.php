<!-- Фильтр товаров -->
<div class="col-2">
    <button class="color-font-pink fs-6 btn-none mb-2 p-0 m-0">Сбросить <img
            src="{{asset('main/img/clear.png')}}" alt="Сброс" width="15" height="15"></button>

    {{--     Фильтр цены    --}}
    <div class="filter-cost">
        <h3 class="fw-bold fs-4 mb-3">Цена</h3>
        <div class="wrapper-range mb-4">
            <div class="container1">
                <div class="slider-track"></div>
                <input type="range" min="0" max="100" value="0" id="slider-1" oninput="slideOne()">
                <input type="range" min="0" max="100" value="100" id="slider-2" oninput="slideTwo()">
            </div>

            <div class="form-row d-flex justify-content-between">
                <div class="form-group col-md-6 pe-2">
                    <input id="range1" class="form-control my-form-control ps-2 " placeholder="От"
                           type="number">
                </div>
                <div class="form-group text-right col-md-6 ps-2">
                    <input id="range2" class="form-control my-form-control ps-2" placeholder="До"
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
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=""
                                   id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Маленький
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=""
                                   id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Средний
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=""
                                   id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Большой
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--     Фильтр ингредиенты    --}}
    <div class="filter-ingredients">
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
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=""
                                   id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Орехи
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=""
                                   id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Мед
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value=""
                                   id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Какао
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
