<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Company;

class FrontEndController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('frontend.companies', compact('companies'));
    }
}
