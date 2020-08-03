<?php

namespace App\Http\Controllers\Admin;

use App\Ward;
use App\Constituency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertWardRequest;

class WardsController extends Controller
{
    
    public function index()
    {
        $wards = Ward::all();
        
        return view('admin.wards.index', compact('wards'));
    }

    public function create()
    {
        $constituencies = Constituency::all();

        return view('admin.wards.create', compact('constituencies'));
    }

    public function show(Ward $ward)
    {
        return view('admin.wards.show', compact('ward'));
    }

    public function store(UpsertWardRequest $request){

        Ward::create($request->validated());

        return redirect()->route('admin.wards.index');
    }

    public function edit(Ward $ward)
    {
        $constituencies = Constituency::all();

        return view('admin.wards.edit', compact('ward', 'constituencies'));

    }

    public function update(UpsertWardRequest $request, Ward $ward)
    {
        $ward->update($request->validated());

        return redirect()->route('admin.wards.show', $ward);
    }

    public function destroy(Ward $ward)
    {
        $ward->delete();

        return redirect()->route('admin.wards.index');
    }
}
