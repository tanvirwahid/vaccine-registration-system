<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\DTOs\UserCreationData;
use App\Models\User;
use App\Models\VaccineSchedule;

class UserRepository implements UserRepositoryInterface
{
    public function create(UserCreationData $data): User
    {
        $userData = [];

        foreach(config('users.columns') as $column)
        {
            $userData[$column] = $data->{$column};;
        }

        return User::create($userData);
    }

    public function getuserWithScheduleFromNid(string $nid): ?User
    {
        return User::where('nid', $nid)->with('schedules')->first();
    }
}
