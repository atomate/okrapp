<?php

namespace App\Listeners;

use App\Models\Company;
use App\Models\Objective;
use App\Models\Result;
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
        $user = User::find($event->user->id)->toArray();
        $name = $event->user->name;
        $companies = Company::all()->where('user_id',$event->user->id)->pluck('id')->toArray();

        foreach ($companies as $id)
        {
            $objectives[] = Objective::all()->where('company_id',$id)->pluck('id')->toArray();
        }
        $objectives = call_user_func_array('array_merge', $objectives);

        foreach ($objectives as $id)
        {
            $results[] = Result::all()->where('objective_id',$id)->where('progress', '<' ,'100');
        }

        $data = [
            'results' => $results,
            'user' => $user
        ];

        Mail::send('mail.DailyNotification', $data, function($message) use ($user,$name) {
            $message->to($user['email']);
            $message->subject("Update Notification for $name");
        });
    }
}
