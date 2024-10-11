<?php

namespace App\Services;

use App\Models\User;
use Carbon\Carbon;

class StatusFinderService
{
    const STATUS_NOT_REGISTERED = 'Not Registered';
    const STATUS_NOT_SCHEDULED = 'Not Scheduled';
    const STATUS_SCHEDULED = 'Scheduled';
    const STATUS_VACCINATED = 'Vaccinated';

    public function getStatus(?User $user): string
    {
        if($user == null)
        {
            return  self::STATUS_NOT_REGISTERED;
        }

        if($user->schedules->count() == 0)
        {
            return self::STATUS_NOT_SCHEDULED;
        }

        $scheduledDate = $user->schedules->first()->date;
        $date = Carbon::parse($scheduledDate);

        if($date->gt(Carbon::today()))
        {
            return self::STATUS_SCHEDULED.' on '. $scheduledDate;
        }

        return self::STATUS_VACCINATED;
    }
}
