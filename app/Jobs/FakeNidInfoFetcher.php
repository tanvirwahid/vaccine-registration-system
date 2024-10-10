<?php

namespace App\Jobs;

use App\Contracts\NidInfoFetcherInterface;
use App\Contracts\Repositories\FakeNidRecordRepositoryInterface;
use App\DTOs\UserInfoFinderData;
use App\Events\UserDataFetched;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class FakeNidInfoFetcher implements ShouldQueue, NidInfoFetcherInterface
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private UserInfoFinderData $data;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private FakeNidRecordRepositoryInterface $fakeNidRecordRepository
    )
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('kk');
        $fakeUserData = $this->fakeNidRecordRepository->findByNid($this->data);

        if ($fakeUserData) {
            event(new UserDataFetched(
                $this->data->uuid,
                true,
                'Successfully Fetched',
                $fakeUserData->name,
                $fakeUserData->date_of_birth
            ));
        } else {
            event(new UserDataFetched(
                $this->data->uuid,
                false,
                'Invalid nid'
            ));

        }
    }

    public function setData(UserInfoFinderData $data): NidInfoFetcherInterface
    {
        $this->data = $data;
        return $this;
    }


}
