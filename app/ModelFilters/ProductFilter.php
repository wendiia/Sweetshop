<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class ProductFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function priceFrom($priceFrom)
    {
        return $this->where('price', '>=', $priceFrom * 100);
    }

    public function priceTo($priceTo)
    {
        return $this->where('price', '<=', $priceTo * 100);
    }

    public function sizes($sizes)
    {
        return $this->whereIn('size_id', $sizes);
    }

    public function specialIngredients($specialIngredients)
    {
        return $this->join('product_special_ingredient', 'products.id', '=', 'product_special_ingredient.product_id')
            ->whereIn('special_ingredient_id', $specialIngredients);
    }
}
