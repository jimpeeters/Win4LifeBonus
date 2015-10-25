<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
use Auth;
use Carbon\Carbon;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /* Alle schedule methods komen hier */ 

        $schedule->command('inspire')
/*                 ->monthly()->at('00:00')->when(function () {
                        return true;
                  });*/
/*->where('created_at', '=', '2015-10-24 07:44:03')*/

                   ->everyMinute()->when(function () {

                    $currentTime = Carbon::now();
                    dd($currentTime);
                        $winner = DB::table('validCodes')
                            ->where('FK_user_id', '!=', 0)
                            ->where('updated_at', '<', $currentTime)
                            ->where('updated_at', '<', $currentTime->addMonth())
                   });


                   /*$winner = new Winner;

                        $winner->FK_user_id = Auth::user()->id;

                        $winner->save();*/
    }
}
