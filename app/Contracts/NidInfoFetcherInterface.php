<?php

namespace App\Contracts;

use App\DTOs\UserInfoFinderData;

interface NidInfoFetcherInterface
{
    public function setData(UserInfoFinderData $data): NidInfoFetcherInterface;
}
