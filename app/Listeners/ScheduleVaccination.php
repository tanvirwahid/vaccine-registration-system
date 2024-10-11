<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Services\VaccineScheduleService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ScheduleVaccination implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct(
        private VaccineScheduleService $vaccineScheduleService
    )
    {}

    /**
     * Handle the event.
     */
    public function handle(UserCreated $event): void
    {
        $this->vaccineScheduleService->create($event->getUserId(), $event->getVaccineCenterId());
    }
}
