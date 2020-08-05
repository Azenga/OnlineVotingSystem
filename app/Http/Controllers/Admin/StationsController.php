<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Station;
use App\StationWorker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::with('workers')->get();

        return view('admin.stations.index', ['stations' => $stations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::query()->role(Role::findOrFail(3))->get();
        
        return view('admin.stations.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'unique:stations'],
            'users_ids' => ['array'],
        ]);

        $station = Station::create($data);

        foreach ($data['users_ids'] as $key => $value) {
            StationWorker::create([
                'user_id' => $value,
                'station_id' => $station->id,
            ]);
        }

        return redirect()->route('admin.stations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        $station->load('workers.user');

        return view('admin.stations.show', compact('station'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
        $users = User::query()->role(Role::findOrFail(3))->get();

        $station->load('workers.user');

        return view('admin.stations.edit', compact('station','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Station $station)
    {
        //dd($request->all());
        
        $data = $request->validate([
            'name' => ['required', 'string'],
            'users_ids' => ['array'],
        ]);
            
        $station->workers()->delete();

        $station->update($data);

        foreach ($data['users_ids'] as $key => $value) {
            StationWorker::create([
                'user_id' => $value,
                'station_id' => $station->id,
            ]);
        }

        return redirect()->route('admin.stations.show', $station);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        $station->workers()->delete();
        
        $station->delete();
        
        return redirect()->route('admin.stations.index');
    }
}
