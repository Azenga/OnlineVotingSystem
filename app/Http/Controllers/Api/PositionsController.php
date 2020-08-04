<?php

namespace App\Http\Controllers\Api;

use App\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PositionResource;

class PositionsController extends Controller
{

    public function index()
    {
        return PositionResource::collection(Position::all());
    }
}
