<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\SignUpRequest;
use App\Http\Controllers\Controller;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function __construct(protected AuthService $service)
    {
    }

    public function signUp(SignUpRequest $request)
    {
        return $this->service->signUp($request->validated());
    }
}
