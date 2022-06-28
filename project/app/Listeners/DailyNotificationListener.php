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
        $user = $user->load('results');



        $results = [];
        $companies = Company::where('user_id',$user->id)->get();
        foreach($companies as $company) {
            $objectives = Objective::where('company_id', $company->id)->get();
            foreach($objectives as $objectives) {
                $results[] = $objectives->results(); 
            }
        }

        if(sizeof($results)>0) {
            $data = [
                'results' => $results
            ];
    
            Mail::send('mail.DailyNotification', $data, function($message) use ($user,$name) {
                $message->to($user['email']);
                $message->subject("Update Notification for $name");
            });
        }
    }
}
