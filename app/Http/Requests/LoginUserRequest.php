<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
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
            'email' => 'required|string|email|max:100',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Почта пользователя обязательна для заполнения',
            'email.email' => 'Неверный формат почты',
            'email.max' => 'Почта пользователя должна состоять максимум из 100 символов',
            'password.required' => 'Пароль обязателен для заполнения',
            'password.min' => 'Пароль должен состоять минимум из 8 символов',
        ];
    }
}
