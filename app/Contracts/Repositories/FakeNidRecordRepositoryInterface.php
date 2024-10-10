<?php

namespace App\Contracts\Repositories;

use App\DTOs\UserInfoFinderData;
use App\Models\FakeNidRecord;

interface FakeNidRecordRepositoryInterface
{
    public function findByNid(UserInfoFinderData $data): ?FakeNidRecord;
}
