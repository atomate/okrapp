<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Objective;
use App\Models\Company;
use App\Http\Requests\Objective\ObjectiveStoreRequest;

class ObjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objectives = Objective::all();

        return view('objectives.index',compact('objectives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
            $companies = Company::all();
            return view('objectives.create',compact('companies', 'company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ObjectiveStoreRequest $request)
    {
        
        $company = Company::findOrFail($request->company_id);
        $objective = new Objective;
        $objective->name = $request->name;
        $company->objectives()->save($objective);
        

        return redirect()->route('key-result.show', $company->id);
        // return redirect()->route('objectives.index')
        //     ->with('message', 'Objective created successfully.');
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
    public function edit(int $objective)
    {   
        $companies = Company::all();
        $objective = Objective::findOrFail($objective);
        return view('objectives.edit', compact('objective','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $objective_id)
    {
        // $objective = Company::findOrFail($request->company_id)                       
        //             ->objective()->where('id',$objective_id)->first();

        // $objective->name = $request->name;

        // $objective->update();

        $company = Company::findOrFail($request->company_id);
        $company->objectives()->where('id',$objective_id)->update([
            'name' => $request->name
        ]);

        // return redirect()->route('objectives.index')
        // ->with('message', 'Objective updated successfully');

        return redirect()->route('key-result.show', $company->id);
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Objective  $objective
     * @return \Illuminate\Http\Response
     */
    public function destroy(Objective $objective)
    { 

        $company_id = $objective->company_id;
        $objective->delete();

        return redirect()->route('key-result.show',$company_id);
    }
}
