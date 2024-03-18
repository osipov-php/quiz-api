<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class UserEloquentRepository implements UserRepositoryInterface
{
   public function create(array $attributes): User
   {
      return User::create($attributes);
   }
   
   public function findOneOrFail(int $id): User
   {
      return User::findOneOrFail($id);
   }

   public function update(int $id, array $attributes): User
   {
      return User::findOneOrFail($id)->update($attributes);
   }

   public function delete(int $id): void
   {
      User::destroy($id);
   }
}


