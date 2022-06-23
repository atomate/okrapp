<?php

namespace App\Http\Controllers;

use App\Events\DailyNotificationEvent;
use App\Jobs\DailyNotificationJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Queue;

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
        return view('home');
    }
}
