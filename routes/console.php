<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('vaccine-notiofication', function () {
    Artisan::call('send-mail-notification');
})->dailyAt('21:00');

