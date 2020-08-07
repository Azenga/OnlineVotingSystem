<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');

Route::view('/dashboard', 'layouts.dashboard');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::resources([
        'levels' => 'LevelsController',
        'positions' => 'PositionsController',
        'counties' => 'CountiesController',
        'constituencies' => 'ConstituenciesController',
        'wards' => 'WardsController',
        'roles' => 'RolesController',
        'permissions' => 'PermissionsController',
        'users' => 'UsersController',
        'candidates' => 'CandidatesController',
        'stations' => 'StationsController',
        'officers' => 'OfficersController',
    ]);

    Route::delete('/roles/{role}/permissions/{permission}', 'RolesPermissionsController@destroy')
        ->name('roles.permissions.destroy');
});
