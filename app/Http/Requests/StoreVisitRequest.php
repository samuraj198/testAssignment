<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreVisitRequest extends FormRequest
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
            'ip_address' => 'required|ip',
            'city' => 'required|string|max:50',
            'device' => 'required|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'ip_address.required' => 'IP адрес обязателен для заполнения',
            'ip_address.ip' => 'Неверный формат IP адреса',
            'city.required' => 'Название города обязательно для заполнения',
            'city.max' => 'Максимальная длина названия города 50 символов',
            'device.required' => 'Название устройства обязательно для заполнения',
            'device.max' => 'Максимальная длина названия устройства 50 символов',
        ];
    }
}
