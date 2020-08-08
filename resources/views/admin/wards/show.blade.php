@extends('layouts.dashboard')

@section('title', $ward->name)

@section('btn')
<a href="{{ route('admin.wards.index') }}" class="btn btn-sm btn-primary">
    <i class="fa fa-long-arrow-alt-left"></i>
</a>
@endsection

@section('content')
<div>
    <div class="row">
        <div class="col-md-6 font-weight-bold">Name</div>
        <div class="col-md-6 font-weight-bold text-primary">{{ $ward->name }}</div>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-6">
            <span class="font-weight-bold">Constituency</span>
        </div>
        <div class="col-md-6">
            <span class="text-primary">{{ $ward->constituency->name }}</span>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <span class="font-weight-bold">County</span>
        </div>
        <div class="col-md-6">
            <span class="text-primary">{{ $ward->constituency->county->name }}</span>
        </div>
    </div>
    <hr>

    <div class="pt-3">
        <h5 class="font-weight-bold text-secondary">Description</h5>
        <p>
            @if ($ward->description)
                {{ $ward->description }}
            @else
                <span class="text-muted">No description</span>
            @endif
        </p>
    </div>

    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.wards.edit', $ward) }}" class="btn btn-primary">
            <i class="fa fa-edit"></i>
            <span>Edit</span>
        </a>
        <form action="{{ route('admin.wards.destroy', $ward) }}" method="post">
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