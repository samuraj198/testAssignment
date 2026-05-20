<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthControllerService
{
    public function register(array $data): void
    {
        $user = User::create($data);
        Auth::login($user);
    }

    public function login(array $data): void
    {
        if (!Auth::attempt($data)) {
            throw ValidationException::withMessages([
                'email' => ['Неверные данные']
            ]);
        }
    }

    public function logout(): void
    {
        Auth::logout();
    }
}
