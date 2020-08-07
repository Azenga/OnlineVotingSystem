<?php

namespace App\Http\Controllers\Admin;

use App\County;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UpsertCountyRequest;

class CountiesController extends Controller
{
    public function index()
    {
        Gate::authorize('view_counties_page');
        
        $counties = County::with('constituencies')->get();
        
        return view('admin.counties.index', compact('counties'));
    }

    public function create()
    {
        Gate::authorize('view_create_county_page');

        return view('admin.counties.create');
    }

    public function store(UpsertCountyRequest $request)
    {
        Gate::authorize('store_county');

        County::create($request->validated());

        return redirect()->route('admin.counties.index');
    }

    public function show(County $county)
    {
        Gate::authorize('view_single_county_page');

        return view('admin.counties.show', compact('county'));
    }

    public function edit(County $county)
    {
        Gate::authorize('view_edit_county_page');

        return view('admin.counties.edit', compact('county'));
    }

    public function update(UpsertCountyRequest $request, County $county)
    {
        Gate::authorize('update_county');

        $county->update($request->validated());

        return redirect()->route('admin.counties.show', $county);
    }

    public function destroy(County $county)
    {
        Gate::authorize('delete_county');
        
        $county->delete();

        return redirect()->route('admin.counties.index');
    }

}
