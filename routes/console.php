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
// php -d memory_limit=1G artisan queue:work database \ --queue=imports \ --sleep=3 \ --tries=1 \ --timeout=1800 \ --memory=2048
// Schedule::command('queue:work database --queue=imports --timeout=1800 --tries=1 --memory=2048')->everyMinute();
// Schedule::command('queue:work database --queue=imports --timeout=1800 --tries=1 --memory=2048 --stop-when-empty')->everyMinute()->withoutOverlapping();
Schedule::command('queue:work database --queue=imports --timeout=1800 --tries=1 --stop-when-empty')->dailyAt('00:00')->withoutOverlapping(120);
