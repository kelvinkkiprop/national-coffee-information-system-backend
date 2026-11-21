<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


/*
|======================================================================
| CustomSchedules
|======================================================================
*/
// Schedule::command('app:send-reminders')->weekdays()->dailyAt('08:00');
// Schedule::command('app:update-permit-status')->dailyAt('00:00');
Schedule::command('app:update-permit-status')->everyMinute();
Schedule::command('app:update-license-status')->everyMinute();
// php artisan queue:work database --queue=imports --timeout=1800 --tries=1 --memory=2048
Schedule::command('queue:work database --queue=imports --timeout=1800 --tries=1 --memory=2048')->everyMinute();
