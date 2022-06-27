<?php

namespace App\Http\Controllers;
use App\Http\Requests\Company\StoreRequest;
use App\Http\Requests\Company\UpdateRequest;
use App\Models\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $companies = Company::all();
        return view('company.index',['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Company::create($data);

        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param company $company
     * @return Application|Factory|View
     */
    public function edit(Company $company)
    {
        return view('company.edit',['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param company $company
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Company $company)
    {
        $data = $request->validated();
        $company->update($data);

        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param company $company
     * @return RedirectResponse
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index');
    }
}
