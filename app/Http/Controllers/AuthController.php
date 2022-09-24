<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use App\Features\Auth\AuthFeature;

class AuthController extends Controller
{
    public function loginPage(AuthService $authService)
    {
        return $authService->loginPage();
    }

    public function login(AuthService $authService, Request $request)
    {
        return $authService->login($request);
    }
}
