<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Services\AuthControllerService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private AuthControllerService $authControllerService)
    {}

    public function register(RegisterUserRequest $request)
    {
        $this->authControllerService->register($request->validated());

        return redirect()->route('dashboard');
    }

    public function login(LoginUserRequest $request)
    {
        $this->authControllerService->login($request->validated());

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        $this->authControllerService->logout();

        return redirect()->route('login');
    }
}
