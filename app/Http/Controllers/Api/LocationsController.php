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
    
    public function countries()
    {
        return CountryResource::collection(Country::all(['id', 'name']));
    }

    public function counties()
    {
        return CountyResource::collection(County::all(['id', 'name']));
    }

    public function constituencies()
    {
        return ConstituencyResource::collection(Constituency::all(['id', 'name']));
    }

    public function wards()
    {
        return WardResource::collection(Ward::all(['id', 'name']));
    }

    public function wardShow(Ward $ward)
    {
        $ward->load(['constituency.county.country', 'users']);

        return new WardResource($ward);

    }
}
