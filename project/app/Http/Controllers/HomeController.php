<?php

namespace App\Http\Controllers;

use App\Events\DailyNotificationEvent;
use App\Jobs\DailyNotificationJob;
use App\Models\User;
use App\Models\Company;
use App\Models\Objective;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        foreach (User::all() as $user) {
            event(new DailyNotificationEvent(User::find($user->id)));
        }
        return view('home');
    }
}
