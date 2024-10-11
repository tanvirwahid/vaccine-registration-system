<?php

namespace App\Contracts\Repositories;

use App\Models\VaccineCenter;

interface VaccineCenterRepositoryInterface
{
    public function getAll();
    public function lockRow(int $id): VaccineCenter;
}
