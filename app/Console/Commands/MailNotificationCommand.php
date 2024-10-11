<?php

namespace App\Console\Commands;

use App\Contracts\Repositories\VaccineScheduleRepositoryInterface;
use App\DTOs\MailData;
use App\Mail\SendMailNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MailNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-mail-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @param string $signature
     */
    public function __construct(
        private VaccineScheduleRepositoryInterface $scheduleRepository
    )
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        foreach ($this->scheduleRepository->getNextDaySchedules() as $schedule)
        {
            Mail::to($schedule->user->email)
                ->queue(new SendMailNotification(
                    MailData::fromData(
                        $schedule->user->name,
                        $schedule->date,
                        $schedule->vaccineCenter->location,
                        $schedule->vaccineCenter->name
                    )
                ));
        }
    }
}
