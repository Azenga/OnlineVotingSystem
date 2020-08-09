@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('content')

    <div class="container py-4">
        <div class="row">
            <div class="col-md-3 bg-white p-3 border d-flex flex-column align-items-center">
                <img class="rounded-circle w-75" src="{{ asset($user->image()) }}" alt="Profile Image">

                <div class="mt-3">
                    <h4 class="font-weight-bold text-gray-900">{{ $user->name }}</h4>
                    <span>{{ $user->role->title }}</span>
                </div>

                <a href="{{ route('profile.edit', $user) }}" class="btn btn-primary w-75 mt-3">Edit Profile</a>
            </div>
            <div class="col-md-9 bg-white p-3 border mt-3 mt-sm-0">
                <div>
                    <ul class="nav nav-tabs">
                        <li class="nav-item" role="presentation">
                            <a href="#basic-details" aria-controls="basic-details" class="nav-link active" role="tab"
                                data-toggle="tab">
                                Basic Details
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#location-details" aria-controls="location-details" class="nav-link" role="tab"
                                data-toggle="tab">
                                Location Details
                            </a>
                        </li>
                    </ul>
                
                    <div class="tab-content" style="min-height: 75vh;">
                        <div id="basic-details" class="tab-pane h-100 active" role="tabpanel">
                            <div class="mt-3 mx-0 mx-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="font-weight-bold">Name</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="text-primary">{{ $user->name }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="font-weight-bold">Email</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="text-primary">{{ $user->email }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="font-weight-bold">Role</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="text-primary">{{ $user->role->title }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="font-weight-bold">National ID Number</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="text-primary">{{ $user->national_id_number }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="font-weight-bold">Phone Number</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="text-primary">{{ $user->phone_number }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="font-weight-bold">Register Date</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="text-primary">{{ $user->created_at->format('m/d/Y') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        <div id="location-details" class="tab-pane h-100" role="tabpanel">
                            <div class="mt-3 mx-0  mx-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="font-weight-bold">Ward</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="text-primary">{{ $user->ward->name }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="font-weight-bold">Constituency</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="text-primary">{{ $user->ward->constituency->name }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="font-weight-bold">County</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="text-primary">{{ $user->ward->constituency->county->name }}</span>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection