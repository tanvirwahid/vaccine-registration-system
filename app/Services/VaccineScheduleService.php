<?php

namespace App\Services;

use App\Contracts\Repositories\VaccineCenterRepositoryInterface;
use App\Contracts\Repositories\VaccineScheduleRepositoryInterface;
use App\DTOs\ScheduleData;
use App\Models\VaccineSchedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VaccineScheduleService
{
    public function __construct(
        private VaccineCenterRepositoryInterface $vaccineCenterRepository,
        private VaccineScheduleRepositoryInterface $vaccineScheduleRepository,
        private ScheduleDateCalculatorService $dateCalculatorService
    )
    {}

    public function create(int $userId, int $vaccineCenterId): VaccineSchedule
    {
        $schedule = DB::transaction(function () use ($userId, $vaccineCenterId) {

            $vaccineCenter = $this->vaccineCenterRepository->lockRow($vaccineCenterId);
            $schedules = $this->vaccineScheduleRepository->getLastDateAndCountFromCanterId($vaccineCenterId);
            $date = $this->dateCalculatorService->getScheduleDate($schedules, $vaccineCenter->limit_per_day);

            return $this->vaccineScheduleRepository->create(
                ScheduleData::fromData($userId, $vaccineCenterId, $date)
            );

        });

        return $schedule;
    }
}
