<?php

namespace App\Repositories;

use App\Contracts\Repositories\VaccineScheduleRepositoryInterface;
use App\DTOs\ScheduleData;
use App\Entities\VaccineScheduleData;
use App\Models\VaccineSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VaccineScheduleRepository implements VaccineScheduleRepositoryInterface
{
    public function create(ScheduleData $data): VaccineSchedule
    {
        return VaccineSchedule::create([
           'user_id' => $data->user_id,
           'vaccine_center_id' => $data->vaccine_center_id,
           'date' => $data->date
        ]);
    }

    public function getLastDateAndCountFromCanterId(int $vaccineCenterId): VaccineScheduleData
    {
        $result = VaccineSchedule::select('date', DB::raw('count(*) as total'))
            ->where('vaccine_center_id', $vaccineCenterId)
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->first();

        if ($result === null) {
            return new VaccineScheduleData();
        }

        return new VaccineScheduleData(
            Carbon::parse($result->date),
            $result->total
        );
    }

}
