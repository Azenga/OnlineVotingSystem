<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function(){
    Route::get('/locations/countries', 'LocationsController@countries');
    Route::get('/locations/counties', 'LocationsController@counties');
    Route::get('/locations/constituencies', 'LocationsController@constituencies');
    Route::get('/locations/wards', 'LocationsController@wards');
    Route::get('/locations/wards/{ward}', 'LocationsController@wardShow');

    Route::get('/positions', 'PositionsController@index');
});
