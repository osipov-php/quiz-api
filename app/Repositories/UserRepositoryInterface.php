<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    public function create(array $attributes): User;
    public function findOneOrFail(int $id): User;
    public function update(int $id, array $attributes): User;
    public function delete(int $id): void;
}
