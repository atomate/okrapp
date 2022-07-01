<?php

namespace App\Http\Controllers;
use App\Models\Objective;
use App\Models\Company;
use App\Http\Requests\Objective\ObjectiveStoreRequest;
use App\Http\Requests\Objective\UpdateRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ObjectiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $objectives = Objective::all();

        return view('objectives.index',compact('objectives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Company $company)
    {
            $company_id = $company->id;
            $companies = Company::all();
            return view('objectives.create',compact('companies', 'company_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ObjectiveStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ObjectiveStoreRequest $request)
    {

        $company = Company::findOrFail($request->company_id);
        $objective = new Objective;
        $objective->name = $request->name;
        $company->objectives()->save($objective);


        return redirect()->route('key-result.show', $company->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Objective $objective
     * @return Application|Factory|View
     */
    public function show(Objective $objective)
    {
        return view('objectives.show', compact('objective'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Objective $objective
     * @return Application|Factory|View
     */
    public function edit(Objective $objective)
    {
        $companies = Company::all();
        return view('objectives.edit', compact('objective','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param $objective_id
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, $objective_id)
    {

        $company = Company::findOrFail($request->company_id);
        $company->objectives()->where('id',$objective_id)->update([
            'name' => $request->name
        ]);

        return redirect()->route('key-result.show', $company->id);
            }

    /**
     * Remove the specified resource from storage.
     *
     * @param Objective $objective
     * @return RedirectResponse
     */
    public function destroy(Objective $objective)
    {

        $company_id = $objective->company_id;
        $objective->delete();

        return redirect()->route('key-result.show',$company_id);
    }
}
