<?php

namespace App\Repositories;

use App\Contracts\Repositories\FakeNidRecordRepositoryInterface;
use App\DTOs\UserInfoFinderData;
use App\Models\FakeNidRecord;

class FakeNidRecordRepository implements FakeNidRecordRepositoryInterface
{
    public function findByNid(UserInfoFinderData $data): ?FakeNidRecord
    {
        return FakeNidRecord::where('nid', $data->nid)->first();
    }

}
