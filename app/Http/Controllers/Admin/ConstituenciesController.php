<?php

namespace App\Http\Controllers\Admin;

use App\County;
use App\Constituency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\UpsertConstituencyRequest;

class ConstituenciesController extends Controller
{
    public function index()
    {
        Gate::authorize('view_constituencies_page');
        
        $constituencies = Constituency::with(['county', 'wards'])->get();

        return view('admin.constituencies.index', compact('constituencies'));
    }

    public function create()
    {
        Gate::authorize('view_create_constituency_page');

        $counties = County::all();

        return view('admin.constituencies.create', compact('counties'));
    }

    public function store(UpsertConstituencyRequest $request)
    {
        Constituency::create($request->validated());

        return redirect()->route('admin.constituencies.index');
    }

    public function show(Constituency $constituency)
    {
        Gate::authorize('view_single_constituency_page');
        return view('admin.constituencies.show', compact('constituency'));
    }

    public function edit(Constituency $constituency)
    {
        Gate::authorize('view_edit_constituency_page');

        $counties = County::all();

        return view('admin.constituencies.edit', compact('constituency', 'counties'));

    }

    public function update(UpsertConstituencyRequest $request, Constituency $constituency)
    {
        Gate::authorize('update_constituency');

        $constituency->update($request->validated());

        return redirect()->route('admin.constituencies.show', $constituency);
    }

    public function destroy(Constituency $constituency){
        
        Gate::authorize('delete_constituency');

        $constituency->delete();

        return redirect()->route('admin.constituencies.index');
    }

}
