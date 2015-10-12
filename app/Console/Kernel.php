<?php namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        'App\Console\Commands\EndpointsVerify',
        'App\Console\Commands\EndpointsReview',
        'App\Console\Commands\EndpointsOverdue'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('endpoints:verify')->dailyAt('03:00')->when(function () {
            return (env('APP_ENV') == 'production') ? true : false;
        });

        $schedule->command('endpoints:review {--due=-14}')->dailyAt('04:00')->when(function () {
            return (env('APP_ENV') == 'production') ? true : false;
        });

        $schedule->command('endpoints:overdue {--due=1}')->dailyAt('05:00')->when(function () {
            return (env('APP_ENV') == 'production') ? true : false;
        });        
    }
}
