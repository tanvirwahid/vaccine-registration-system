<?php

namespace App\Services;

use App\Contracts\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class StatusService
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private StatusFinderService $statusFinderService
    )
    {}

    public function getStatus(string $nid): string
    {
        return Cache::remember(
            hash('sha256', $nid),
            6*60,
            function () use ($nid){
                return $this->statusFinderService
                    ->getStatus(
                        $this->userRepository->getuserWithScheduleFromNid($nid)
                    );
            }
        );
    }
}
