<?php

namespace App\DTOs;

use Carbon\Carbon;

class ScheduleData
{
    public function __construct(
        public int $user_id,
        public int $vaccine_center_id,
        public Carbon $date
    )
    {}

    public static function fromData(
        int $userId,
        int $vaccineCenterId,
        Carbon $date
    )
    {
        return new self(
            $userId,
            $vaccineCenterId,
            $date
        );
    }
}
