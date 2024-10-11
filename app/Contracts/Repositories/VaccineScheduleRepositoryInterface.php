<?php

namespace App\Contracts\Repositories;

use App\DTOs\ScheduleData;
use App\Entities\VaccineScheduleData;
use App\Models\VaccineSchedule;
use Illuminate\Database\Eloquent\Collection;

interface VaccineScheduleRepositoryInterface
{
    public function create(ScheduleData $data): VaccineSchedule;
    public function getLastDateAndCountFromCanterId(int $vaccineCenterId): VaccineScheduleData;
    public function getNextDaySchedules(): Collection;
}
