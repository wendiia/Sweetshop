<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStoreRequest extends FormRequest
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
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'middle_name' => 'max:50',
            'phone' => 'required|unique:users,phone|string|size:16',
            'email' => 'required|unique:users,email|email|max:100',
            'password' => 'required|min:3|max:255',  // поменять min:7
            'passwordRepeat' => 'required|same:password',
        ];
    }
}
