<?php

namespace App\Services;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\DTOs\UserCreationData;
use App\Models\User;

class UserService
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    )
    {}

    public function create(UserCreationData $data): User
    {
        return $this->userRepository->create($data);
    }
}
