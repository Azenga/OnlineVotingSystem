@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('styles')

<style>
    .top-75{
        margin-top: 75px;
    }
</style>
    
@endsection

@section('content')
<div class="container py-4 top-75">
    <ul class="nav nav-tabs">
        <li class="nav-item" role="presentation">
            <a href="#user-details" aria-controls="user-details" class="nav-link active" role="tab"
                data-toggle="tab">
                User Details
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a href="#candidature-details" aria-controls="candidature-details" class="nav-link" role="tab"
                data-toggle="tab">
                Candidature Details
            </a>
        </li>
    </ul>

    <div class="tab-content" style="min-height: 75vh;">
        <div id="user-details" class="tab-pane h-100 active" role="tabpanel">
            <div class="mt-3 mx-0 mx-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <span class="font-weight-bold">Name</span>
                    </div>
                    <div class="col-md-6">
                        <span class="text-primary">{{ $candidate->user->name }}</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <span class="font-weight-bold">Ward</span>
                    </div>
                    <div class="col-md-6">
                        <span class="text-primary">{{ $candidate->user->ward->name }}</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <span class="font-weight-bold">Phone Number</span>
                    </div>
                    <div class="col-md-6">
                        <span class="text-primary">{{ $candidate->user->phone_number }}</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <span class="font-weight-bold">Alive</span>
                    </div>
                    <div class="col-md-6">
                        <span class="text-primary">{{ $candidate->user->isalive ? 'True' : 'False' }}</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <span class="font-weight-bold">Active</span>
                    </div>
                    <div class="col-md-6">
                        <span class="text-primary">{{ $candidate->user->isactive ? 'True' : 'False' }}</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <span class="font-weight-bold">Voted</span>
                    </div>
                    <div class="col-md-6">
                        <span class="text-primary">{{ $candidate->user->hasvoted ? 'True' : 'False' }}</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <span class="font-weight-bold">Last Updated</span>
                    </div>
                    <div class="col-md-6">
                        <span class="text-primary">{{ $candidate->user->updated_at->format('m/d/Y') }}</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <span class="font-weight-bold">Registered</span>
                    </div>
                    <div class="col-md-6">
                        <span class="text-primary">{{ $candidate->user->created_at->format('m/d/Y') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div id="candidature-details" class="tab-pane h-100" role="tabpanel">
            <div class="mt-3 mx-0  mx-md-4">

                <div class="row">
                    <div class="col-md-6">
                        <span class="font-weight-bold">Position</span>
                    </div>
                    <div class="col-md-6">
                        <span class="text-primary">{{ $candidate->position->title }}</span>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <span class="font-weight-bold">Location</span>
                    </div>
                    <div class="col-md-6">
                        <span class="text-primary">{{ $candidate->where() }}</span>
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <span class="font-weight-bold">Since</span>
                    </div>
                    <div class="col-md-6">
                        <span class="text-primary">{{ $candidate->created_at->format('m/d/Y') }}</span>
                    </div>
                </div>
                <hr>   

                <div class="row">
                    <div class="col-md-6">
                        <span class="font-weight-bold">Party</span>
                    </div>
                    <div class="col-md-6">
                        <span class="text-primary">{{ is_null($candidate->party) ? 'Independent' : $candidate->party }}</span>
                    </div>
                </div>
                <hr>   
        
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" id="active-checkbox" 
                    {{ $candidate->incumbent  ? 'checked' : '' }} disabled>
                    <label class="form-check-label" for="active-checkbox">
                        Incumbent
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection