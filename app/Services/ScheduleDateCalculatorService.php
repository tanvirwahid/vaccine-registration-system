<?php

namespace App\Services;

use App\Entities\VaccineScheduleData;
use Carbon\Carbon;

class ScheduleDateCalculatorService
{
    public function getScheduleDate(VaccineScheduleData $scheduleData, int $limit): Carbon
    {
        $date = $this->getWeekDay(Carbon::today());

        if ($scheduleData->getDate() !== null) {
            $date = $scheduleData->getDate();

            if ($scheduleData->getTotal() >= $limit) {
                $date = $this->getWeekDay($date->addDay());
            }
        }

        $now = Carbon::now();
        $eightPM = Carbon::today()->setTime(20, 0);

        if ($date->isToday()) {
            $date = $this->getWeekDay($date->addDay());
        }

        if ($date->isTomorrow() && $now->gte($eightPM)) {
            $date = $this->getWeekDay($date->addDay());
        }

        return $date;
    }

    private function getWeekDay(Carbon $date): Carbon
    {
        if ($date->isFriday() || $date->isSaturday()) {
            return $date->next(Carbon::SUNDAY);
        }

        return $date;
    }
}
