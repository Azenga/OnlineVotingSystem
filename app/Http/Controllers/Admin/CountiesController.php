<?php

namespace App\Http\Controllers\Admin;

use App\County;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertCountyRequest;

class CountiesController extends Controller
{
    public function index()
    {
        $counties = County::all();
        
        return view('admin.counties.index', compact('counties'));
    }

    public function create()
    {
        return view('admin.counties.create');
    }

    public function store(UpsertCountyRequest $request)
    {
        County::create($request->validated());

        return redirect()->route('admin.counties.index');
    }

    public function show(County $county)
    {
        return view('admin.counties.show', compact('county'));
    }

    public function edit(County $county)
    {
        return view('admin.counties.edit', compact('county'));
    }

    public function update(UpsertCountyRequest $request, County $county)
    {
        
        $county->update($request->validated());

        return redirect()->route('admin.counties.show', $county);
    }

    public function destroy(County $county)
    {
        $county->delete();

        return redirect()->route('admin.counties.index');
    }

}
