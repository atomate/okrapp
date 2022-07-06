<?php

namespace App\Listeners;

use App\Mail\DailyNotification;
use App\Mail\DailyNotificationMail;
use App\Models\Company;
use App\Models\Objective;
use App\Models\KeyResult;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class DailyNotificationListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function handle($event)
    {
        $keyResults = $event->user->objectives->map(function ($objective) {
            return $objective->keyResults()->where('progress', '<', '100')->pluck('title');
        })->flatten();

        if (sizeof($keyResults) > 0) {
            Mail::to($event->user->email)->send(new DailyNotificationMail($event->user,$keyResults));
        }

    }
}
