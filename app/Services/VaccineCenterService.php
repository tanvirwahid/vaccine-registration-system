<?php

namespace App\Services;

use App\Contracts\Repositories\VaccineCenterRepositoryInterface;

class VaccineCenterService
{
    public function __construct(
        private VaccineCenterRepositoryInterface $vaccineCenterRepository
    )
    {}

    public function getAll()
    {
        return $this->vaccineCenterRepository->getAll();
    }
}
