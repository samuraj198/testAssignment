<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Имя пользователя обязательно для заполнения',
            'name.max' => 'Имя пользователя должно состоять максимум из 100 символов',
            'email.required' => 'Почта пользователя обязательна для заполнения',
            'email.email' => 'Неверный формат почты',
            'email.max' => 'Почта пользователя должна состоять максимум из 100 символов',
            'email.unique' => 'Пользователь с такой почтой уже зарегистрирован',
            'password.required' => 'Пароль обязателен для заполнения',
            'password.min' => 'Пароль должен состоять минимум из 8 символов',
            'password.confirmed' => 'Пароли не совпадают'
        ];
    }
}
