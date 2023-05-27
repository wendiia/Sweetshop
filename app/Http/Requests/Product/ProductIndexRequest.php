<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'priceFrom' => 'integer|min:0',
            'priceTo' => 'integer|gte:priceFrom',
            'sizes' => 'array',
            'sizes.*' => 'integer|exists:sizes,id',
            'specialIngredients' => 'array',
            'specialIngredients.*' => 'integer|exists:special_ingredients,id',
            'sort' => ['string', Rule::in(['price.asc', 'price.desc', 'created_at.asc', 'none'])],
        ];
    }
}
