<?php

namespace App\Http\Controllers\Admin;

use App\Level;
use App\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertPositionRequest;

class PositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.positions.index', ['positions' => Position::with('level')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.positions.create', ['levels' => Level::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UpsertPositionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpsertPositionRequest $request)
    {
        Position::create($request->validated());

        return redirect()->route('admin.positions.index');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        
        $position->load('level');

        return view('admin.positions.show', compact('position'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        $position->load('level');
        $levels = Level::all();

        return view('admin.positions.edit', compact('position', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpsertPositionRequest  $request
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(UpsertPositionRequest $request, Position $position)
    {
        $position->update($request->validated());

        return redirect()->route('admin.positions.show', $position);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->route('admin.positions.index');
    }
}
