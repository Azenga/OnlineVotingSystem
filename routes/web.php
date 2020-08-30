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

Route::view('/', 'home')->name('home');
Route::view('/faqs', 'faqs')->name('faqs');

Route::resource('candidates', 'CandidatesController')
    ->only(['index', 'show'])
    ->parameters(['candidates' => 'candidature']);

Route::get('/results', 'ResultsController')->name('results');

/*
|----------------------------------------------------------------------------
| Auth Routes
|----------------------------------------------------------------------------
|
| The basic auth routes but without including the register route
|
*/
Auth::routes(['register' => false]);

/*
|----------------------------------------------------------------------------
| Admin Routes
|----------------------------------------------------------------------------
|
| Here are the routes for both the admin and the super admin
|
*/
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

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

    Route::get('/results', 'ResultsController')->name('results');
});

/*
|----------------------------------------------------------------------------
| Officers Routes
|----------------------------------------------------------------------------
|
| Here are the routes for officers / sub-admins / clerks and what have you
|
*/
Route::group(['namespace' => 'Officer', 'prefix' => 'officer', 'as' => 'officer.'], function(){

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('users', 'UsersController');
    
});

/*
|----------------------------------------------------------------------------
| Authenticate User Routes
|----------------------------------------------------------------------------
|
| Here are the routes that any authenticated user should access
|
*/
Route::middleware('auth')->group(function(){
    Route::get('profiles/{user}', 'ProfilesController@show')->name('profile.show');
    Route::get('profiles/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
    Route::patch('profiles/{user}', 'ProfilesController@update')->name('profile.update');
    Route::any('vote', 'VotingController')->name('vote');
    
    Route::any('vote/confirm', 'CastingController')->name('vote.confirm');
});