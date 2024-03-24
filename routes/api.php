<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/auth/sign-up', 'signUp');
        Route::post('/auth/sign-in', 'signIn');
        Route::post('/auth/sign-out', 'signOut');
    });

    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum');
});


