<?php

namespace App\Providers;

use App\Contracts\Repositories\FakeNidRecordRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Contracts\Repositories\VaccineCenterRepositoryInterface;
use App\Repositories\FakeNidRecordRepository;
use App\Repositories\UserRepository;
use App\Repositories\VaccineCenterRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            FakeNidRecordRepositoryInterface::class,
            FakeNidRecordRepository::class
        );

        $this->app->bind(
            VaccineCenterRepositoryInterface::class,
            VaccineCenterRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
