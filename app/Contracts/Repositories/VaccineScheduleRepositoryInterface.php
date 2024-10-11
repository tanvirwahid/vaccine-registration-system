<?php

namespace App\Contracts\Repositories;

use App\DTOs\ScheduleData;
use App\Entities\VaccineScheduleData;
use App\Models\VaccineSchedule;

interface VaccineScheduleRepositoryInterface
{
    public function create(ScheduleData $data): VaccineSchedule;
    public function getLastDateAndCountFromCanterId(int $vaccineCenterId): VaccineScheduleData;
}
