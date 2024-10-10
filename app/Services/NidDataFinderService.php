<?php

namespace App\Services;

use App\Contracts\NidInfoFetcherInterface;
use App\DTOs\UserInfoFinderData;

class NidDataFinderService
{
    const QUEUE_NAME = 'nid-fetcher';

    public function __construct(
        private NidInfoFetcherInterface $nidInfoFetcher
    )
    {}

    public function fetchUserData(UserInfoFinderData $data)
    {
        $this->nidInfoFetcher->setData($data);
        dispatch($this->nidInfoFetcher);
    }
}
