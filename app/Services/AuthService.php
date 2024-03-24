<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService {
    public function __construct(
        protected UserRepositoryInterface $users,
    )
    {
    }
    
    public function signUp(array $attributes): User 
    {
        $attributes['password'] = Hash::make($attributes['password']);
        return $this->users->create($attributes);
    }

    public function signIn(array $credentials): bool
    {
        return Auth::attempt($credentials);
    }

    public function signOut(): void
    {
        Auth::logout();
    }
}
