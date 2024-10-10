<?php

namespace App\Contracts\Repositories;

use App\DTOs\UserCreationData;
use App\Models\User;

interface UserRepositoryInterface
{
    public function create(UserCreationData $data): User;
}
