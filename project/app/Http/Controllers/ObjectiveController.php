<?php

namespace App\Http\Controllers;

use App\Models\Objective;
use App\Models\Company;
use Illuminate\Http\Request;

class ObjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objectives = Objective::latest()->paginate(5);

        return view('objectives.index',compact('objectives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $companies = Company::all();
            return view('objectives.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = Company::findOrFail($request->company_id);
        $company->objective()->create([
            'name' => $request->name
        ]);
        
        $request->validate([
            'name' => 'required',
        ]);

        // Objective::create($request->all());

        return redirect()->route('objectives.index')
            ->with('success', 'Objective created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function show(Objective $objective)
    {
        return view('objectives.show', compact('objective'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function edit(Objective $objective)
    {
        return view('objectives.edit', compact('objective'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Objective $objective)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $objective->update($request->all());

        return redirect()->route('objectives.index')
            ->with('success', 'Objective updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objective $objective)
    {
        $objective->delete();

        return redirect()->route('objectives.index')
            ->with('success', 'Objective deleted successfully');
    }
}
