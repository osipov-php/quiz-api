<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class AuthService {
    public function __construct(protected UserRepositoryInterface $users)
    {
    }
    
    public function signUp(array $attributes): User {
        $attributes['password'] = Hash::make($attributes['password']);
        return $this->users->create($attributes);
    }
}
