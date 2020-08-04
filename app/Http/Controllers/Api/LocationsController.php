<?php

namespace App\Http\Controllers\Api;

use App\Ward;
use App\County;
use App\Country;
use App\Constituency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\WardResource;
use App\Http\Resources\CountyResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\ConstituencyResource;

class LocationsController extends Controller
{
    
    public function index()
    {
        return CountryResource::collection(Country::with('counties.constituencies.wards')->get());
    }

    public function counties()
    {
        return CountyResource::collection(County::with('constituencies.wards')->get());
    }

    public function constituencies()
    {
        return ConstituencyResource::collection(Constituency::with('wards')->get());
    }

    public function wards()
    {
        return WardResource::collection(Ward::all());
    }

    public function wardShow(Ward $ward)
    {
        $ward->load('constituency.county.country');

        return new WardResource($ward);

    }
}
