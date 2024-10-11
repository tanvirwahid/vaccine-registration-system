<?php

namespace App\Contracts\Repositories;

use App\DTOs\UserCreationData;
use App\Models\User;
use App\Models\VaccineSchedule;

interface UserRepositoryInterface
{
    public function create(UserCreationData $data): User;
    public function getuserWithScheduleFromNid(string $nid): ?User;
}
