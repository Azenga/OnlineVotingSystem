<?php

namespace App\Http\Controllers\Admin;

use App\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertLevelRequest;

class LevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.levels.index', ['levels' => Level::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UpsertLevelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpsertLevelRequest $request)
    {
        Level::create($request->validated());

        return redirect()->route('admin.levels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpsertLevelRequest  $request
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(UpsertLevelRequest $request, Level $level)
    {
        $level->update($request->validated());

        return redirect()->route('admin.levels.show', $level);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level->delete();

        return back();
    }
}
