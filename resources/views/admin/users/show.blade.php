@extends('layouts.dashboard')

@section('title', $user->name)

@section('btn')
<a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-primary">
    <i class="fa fa-long-arrow-alt-left"></i>
</a>
@endsection

@section('content')
<div>
    <div>
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
    </div>

    <div class="d-flex justify-content-end mt-3">
        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">
            <i class="fa fa-edit"></i>
            <span>Edit</span>
        </a>
        <form action="{{ route('admin.users.destroy', $user) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger d-flex align-items-center ml-3">
                <i class="fa fa-trash-alt"></i>
                <span class="ml-2">Delete</span>
            </button>
        </form>
    </div>
</div>
@endsection