<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\SignUpRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignInRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService,
    ) {
    }

    public function signUp(SignUpRequest $request)
    {
        return $this->authService->signUp($request->validated());
    }

    public function signIn(SignInRequest $request)
    {
        $statusCode = Response::HTTP_UNAUTHORIZED;

        if ($this->authService->signIn($request->validated())) {
            $request->session()->regenerate();
            $statusCode = Response::HTTP_NO_CONTENT;
        }

        return response(null, $statusCode);
    }

    public function signOut(Request $request)
    {
        $this->authService->signOut();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
