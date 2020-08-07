<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Ward;
use App\Station;
use App\StationWorker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class StationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('view_stations_page');
        
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
        Gate::authorize('view_create_station_page');

        $users = User::query()->role(Role::findOrFail(3))->get();

        $wards = Ward::all();
        
        return view('admin.stations.create', compact('users', 'wards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('store_station');

        $data = $request->validate([
            'name' => ['required', 'string', 'unique:stations'],
            'ward_id' => ['required', 'numeric'],
            'users_ids' => ['array'],
        ]);

        $station = Station::create($data);

        foreach ($data['users_ids'] as $key => $value) {
            
            StationWorker::create([
                'user_id' => $value,
                'station_id' => $station->id,
            ]);

            User::findOrFail($value)->update(['role_id' => 3]);
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
        Gate::authorize('view_single_station_page');

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
        Gate::authorize('view_edit_station_page');

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
        Gate::authorize('update_station');
        
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
        Gate::authorize('delete_station');
        
        $station->workers()->delete();
        
        $station->delete();
        
        return redirect()->route('admin.stations.index');
    }
}
