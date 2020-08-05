@extends('layouts.app')

@section('content')

<div class="container">
    <div class="">
        <a href="{{ route('admin.candidates.index') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-long-arrow-alt-left"></i>
        </a>
    </div>

    <div class="row justify-content-center py-3">
        <div class="col-md-10">
            <h4 class="font-weight-bold text-secondary">
                <span>{{ $user->name }}</span>
            </h4>

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
                                <span class="font-weight-bold">Ward</span>
                            </div>
                            <div class="col-md-6">
                                <span class="text-primary">{{ $user->ward->name }}</span>
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
                                <span class="font-weight-bold">Alive</span>
                            </div>
                            <div class="col-md-6">
                                <span class="text-primary">{{ $user->isalive ? 'True' : 'False' }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="font-weight-bold">Active</span>
                            </div>
                            <div class="col-md-6">
                                <span class="text-primary">{{ $user->isactive ? 'True' : 'False' }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="font-weight-bold">Voted</span>
                            </div>
                            <div class="col-md-6">
                                <span class="text-primary">{{ $user->hasvoted ? 'True' : 'False' }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="font-weight-bold">Last Updated</span>
                            </div>
                            <div class="col-md-6">
                                <span class="text-primary">{{ $user->updated_at->format('m/d/Y') }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <span class="font-weight-bold">Registered</span>
                            </div>
                            <div class="col-md-6">
                                <span class="text-primary">{{ $user->created_at->format('m/d/Y') }}</span>
                            </div>
                        </div>
                        <hr>

                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">
                            <i class="fa fa-edit"></i>
                            <span>Edit User Details</span>
                        </a>
                    </div>
                </div>

                <div id="candidature-details" class="tab-pane h-100" role="tabpanel">
                    <div class="mt-3 mx-0  mx-md-4">

                        <div class="row">
                            <div class="col-md-6">
                                <span class="font-weight-bold">Position</span>
                            </div>
                            <div class="col-md-6">
                                <span class="text-primary">{{ $user->candidature->position->title }}</span>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <span class="font-weight-bold">Location</span>
                            </div>
                            <div class="col-md-6">
                                <span class="text-primary">{{ $user->candidature->where() }}</span>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <span class="font-weight-bold">Since</span>
                            </div>
                            <div class="col-md-6">
                                <span class="text-primary">{{ $user->candidature->created_at->format('m/d/Y') }}</span>
                            </div>
                        </div>
                        <hr>   

                        <div class="row">
                            <div class="col-md-6">
                                <span class="font-weight-bold">Party</span>
                            </div>
                            <div class="col-md-6">
                                <span class="text-primary">{{ is_null($user->candidature->party) ? 'Independent' : $user->candidature->party }}</span>
                            </div>
                        </div>
                        <hr>   
                
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="active-checkbox" 
                            {{ $user->candidature->incumbent  ? 'checked' : '' }} disabled>
                            <label class="form-check-label" for="active-checkbox">
                                Incumbent
                            </label>
                        </div> 
                        <hr>
                        <div class="d-flex flex-column flex-md-row">
                            <a href="{{ route('admin.candidates.edit', $user->id) }}" class="btn btn-primary">
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-edit"></i>
                                    <span class="ml-2">Edit Candidature</span>
                                </div>
                            </a>
    
                            <form class="d-inline-block mt-0 mt-md-2" action="{{ route('admin.candidates.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ml-0 ml-md-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-trash-alt"></i>
                                        <span class="ml-2">Revoke Candidature</span>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
    
@endsection