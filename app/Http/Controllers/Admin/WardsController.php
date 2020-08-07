<?php

namespace App\Http\Controllers\Admin;

use App\Ward;
use App\Constituency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UpsertWardRequest;

class WardsController extends Controller
{
    
    public function index()
    {
        Gate::authorize('view_wards_page');
        
        $wards = Ward::with(['constituency.county', 'users'])->get();
        
        return view('admin.wards.index', compact('wards'));
    }

    public function create()
    {
        Gate::authorize('view_create_ward_page');

        $constituencies = Constituency::all();

        return view('admin.wards.create', compact('constituencies'));
    }

    public function show(Ward $ward)
    {
        Gate::authorize('view_single_ward_page');

        return view('admin.wards.show', compact('ward'));
    }

    public function store(UpsertWardRequest $request){

        Gate::authorize('store_ward');

        Ward::create($request->validated());

        return redirect()->route('admin.wards.index');
    }

    public function edit(Ward $ward)
    {
        Gate::authorize('view_edit_ward_page');

        $constituencies = Constituency::all();

        return view('admin.wards.edit', compact('ward', 'constituencies'));

    }

    public function update(UpsertWardRequest $request, Ward $ward)
    {
        Gate::authorize('update_ward');

        $ward->update($request->validated());

        return redirect()->route('admin.wards.show', $ward);
    }

    public function destroy(Ward $ward)
    {
        Gate::authorize('delete_ward');
        
        $ward->delete();

        return redirect()->route('admin.wards.index');
    }
}
