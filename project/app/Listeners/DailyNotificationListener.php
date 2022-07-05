<?php

namespace App\Listeners;

use App\Models\Company;
use App\Models\Objective;
use App\Models\KeyResult;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class DailyNotificationListener
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
        $name = $event->user->name;
        $user = User::find($event->user->id);

        $objectives = $user->objectives;
        $keyResultsTemp = $objectives->map(function ($objective) {
            return $objective->keyResults()->where('progress', '<', '100')->pluck('title');
        });

        $keyResults = collect();
        foreach ($keyResultsTemp as $keyResult) {
            $keyResults = $keyResults->merge($keyResult);
        }

        if (sizeof($keyResults) > 0) {
            $data = [
                'results' => $keyResults
            ];

            Mail::send('mail.DailyNotification', $data, function ($message) use ($user, $name) {
                $message->to($user['email']);
                $message->subject("Update Notification for $name");
            });
        }

    }
}
