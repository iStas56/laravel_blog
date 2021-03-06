<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'role' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле обязательно для заполнения',
            'name.string' => 'Имя должно быть строкой',
            'email.required' => 'Поле обязательно для заполнения',
            'email.string' => 'Почта должна быть строкой',
            'email.email' => 'Почта должна быть в формате mail@some.domain.ru',
            'email.unique' => 'Пользователь с таким email существует',
        ];
    }
}
