<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/sign-up', [AuthController::class, 'signUp']);
