<?php

namespace App\Services;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\DTOs\UserCreationData;
use App\Events\UserCreated;
use App\Models\User;

class UserService
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    )
    {}

    public function create(UserCreationData $data): User
    {
        $user = $this->userRepository->create($data);

        event(new UserCreated($user->id, $data->vaccine_center_id));

        return $user;
    }
}
