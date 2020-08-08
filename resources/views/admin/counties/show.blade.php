@extends('layouts.dashboard')

@section('title', $county->name)

@section('btn')
<a href="{{ route('admin.counties.index') }}" class="btn btn-sm btn-primary">
    <i class="fa fa-long-arrow-alt-left"></i>
</a>
@endsection

@section('content')

<div>
    <div class="row">
        <div class="col-md-6">Name</div>
        <div class="col-md-6 font-weight-bold text-primary">{{ $county->name }}</div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">Region</div>
        <div class="col-md-6 font-weight-bold text-primary">{{ $county->region }}</div>
    </div>

    <div class="d-flex justify-content-end mt-5">
        <a href="{{ route('admin.counties.edit', $county) }}" class="btn btn-primary">
            <i class="fa fa-edit"></i>
            <span>Edit</span>
        </a>
        <form action="{{ route('admin.counties.destroy', $county) }}" method="post">
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