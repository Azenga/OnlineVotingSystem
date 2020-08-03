<?php

namespace App\Http\Controllers\Admin;

use App\County;
use App\Constituency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertConstituencyRequest;

class ConstituenciesController extends Controller
{
    public function index()
    {
        $constituencies = Constituency::with('county')->get();

        return view('admin.constituencies.index', compact('constituencies'));
    }

    public function create()
    {
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
        return view('admin.constituencies.show', compact('constituency'));
    }

    public function edit(Constituency $constituency)
    {
        $counties = County::all();

        return view('admin.constituencies.edit', compact('constituency', 'counties'));

    }

    public function update(UpsertConstituencyRequest $request, Constituency $constituency)
    {
        $constituency->update($request->validated());

        return redirect()->route('admin.constituencies.show', $constituency);
    }

    public function destroy(Constituency $constituency){

        $constituency->delete();

        return redirect()->route('admin.constituencies.index');
    }

}
