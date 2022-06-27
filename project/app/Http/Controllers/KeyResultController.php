<?php

namespace App\Http\Controllers;

use App\Http\Requests\KeyResult\StoreRequest;
use App\Http\Requests\KeyResult\UpdateRequest;
use App\Models\Company;
use App\Models\KeyResult;
use App\Models\Objective;

class KeyResultController extends Controller
{
    function show(Company $company)
    {
        $objectives = Objective::all()->where('company_id', $company->id);

        return view('keyresult.show', ['company' => $company, 'objectives' => $objectives]);
    }

    function create(Objective $objective)
    {
        return view('keyresult.create', ['objective' => $objective]);
    }

    function store(StoreRequest $request)
    {
        $data = $request->validated();
        KeyResult::create($data);
        $objective = Objective::find($data['objective_id']);

        return redirect()->route('key-result.show', $objective->company->id);
    }

    function edit(KeyResult $keyResult)
    {
        return view('keyresult.edit', ['keyResult' => $keyResult]);
    }

    function update(UpdateRequest $request,KeyResult $keyResult)
    {
        $data = $request->validated();
        $keyResult->update($data);

        $keyResult = KeyResult::find($data['keyResult_id']);
        $objective = Objective::find($keyResult->objective_id);

        return redirect()->route('key-result.show',$objective->company_id);
    }

    function destroy(KeyResult $keyResult) {

        $keyResult->delete();
        $objective = Objective::find($keyResult->objective->id);
        return redirect()->route('key-result.show',$objective->company_id);
    }
}
