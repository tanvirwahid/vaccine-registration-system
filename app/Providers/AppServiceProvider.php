<?php

namespace App\Providers;

use App\Contracts\NidInfoFetcherInterface;
use App\Jobs\FakeNidInfoFetcher;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            NidInfoFetcherInterface::class,
            FakeNidInfoFetcher::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
