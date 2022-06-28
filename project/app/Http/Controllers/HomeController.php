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
        $user = Auth::user();

        // $company = Company::where('id',1)->get();
        // var_dump($company);exit();


        // $results = [];
        // foreach($companies as $company) {
        //     $results[] = $company->objectives->keyResults;
        // }



        // dd($results);



        $objectives = $user->companies->where('id',1)->first()->objectives;

        // $objective = Objective::with('company')->where('id',1)->first();
        // dd($objective->company());


        return view('home');
    }
}
