<?php

namespace App\Http\Controllers\Admin;

use App\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
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
        Gate::authorize('view_levels_page');
        
        return view('admin.levels.index', ['levels' => Level::with('positions')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('view_create_level_page');
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
        Guard::authorize('store_level');
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
        Guard::authorize('view_single_level_page');
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
        Guard::authorize('view_edit_level_page');
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
        Guard::authorize('update_level');
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
        Guard::authorize('delete_level');
        
        $level->delete();

        return back();
    }
}
