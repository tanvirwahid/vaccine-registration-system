<?php

namespace App\Repositories;

use App\Contracts\Repositories\VaccineCenterRepositoryInterface;
use App\Models\VaccineCenter;

class VaccineCenterRepository implements VaccineCenterRepositoryInterface
{
    public function getAll()
    {
        return VaccineCenter::all();
    }

    public function lockRow(int $id): VaccineCenter
    {
        return VaccineCenter::where('id', $id)
            ->lockForUpdate()
            ->first();
    }

}
