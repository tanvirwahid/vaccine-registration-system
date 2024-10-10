<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\DTOs\UserCreationData;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function create(UserCreationData $data): User
    {
        $user = new User;

        foreach(config('users.columns') as $column)
        {
            $user->{$column} = $data->{$column};
        }

        $user->save();

        return $user;
    }
}
