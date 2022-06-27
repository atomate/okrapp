<?php

namespace App\Http\Controllers;

use App\Http\Requests\KeyResult\StoreRequest;
use App\Http\Requests\KeyResult\UpdateRequest;
use App\Models\Company;
use App\Models\KeyResult;
use App\Models\Objective;
use App\Repositories\KeyResultRepository;


class KeyResultController extends Controller
{
    private $repository;

    public function __construct(KeyResultRepository $repository)
    {
        $this->repository = $repository;
    }

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
        $objective = $this->repository->store($data);

        return redirect()->route('key-result.show', $objective->company_id);
    }

    function edit(KeyResult $keyResult)
    {
        return view('keyresult.edit', ['keyResult' => $keyResult]);
    }

    function update(UpdateRequest $request, KeyResult $keyResult)
    {
        $data = $request->validated();
        $objective = $this->repository->update($keyResult, $data);

        return redirect()->route('key-result.show', $objective->company_id);
    }

    function destroy(KeyResult $keyResult)
    {
        $objective = $this->repository->delete($keyResult);

        return redirect()->route('key-result.show', $objective->company_id);
    }
}
