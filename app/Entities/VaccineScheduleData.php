<?php

namespace App\Entities;

use Carbon\Carbon;

class VaccineScheduleData
{
    public function __construct(
        private ?Carbon $date = null,
        private int $total = 0
    )
    {}

    public function getDate(): ?Carbon
    {
        return $this->date;
    }

    public function setDate(?Carbon $date): void
    {
        $this->date = $date;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): void
    {
        $this->total = $total;
    }


}
