<?php

namespace App\Http\Requests\Login;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LoginUpdateRequest extends FormRequest
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
            'phone' => ['required','string', 'size:16', Rule::notIn(User::where('id', '<>', auth()->user()->id)->pluck('phone'))],
            'email' => ['required','email', 'max:100', Rule::notIn(User::where('email', '<>', auth()->user()->email)->pluck('email'))],
//            'password' => 'required|min:3|max:255',  // поменять min:7
//            'passwordRepeat' => 'required|same:password',
        ];
    }
}
