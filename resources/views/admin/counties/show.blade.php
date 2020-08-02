@extends('layouts.app')

@section('content')

<div class="container">
    <div class="">
        <a href="{{ route('admin.counties.index') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-long-arrow-alt-left"></i>
        </a>
    </div>

    <div class="row justify-content-center py-3">
        <div class="col-md-8">
            <h4 class="font-weight-bold text-secondary">
                <span>{{ $county->name }}</span>
            </h4>

            <div class="pt-3">
                <h5 class="font-weight-bold text-secondary">Description</h5>
                
                <div class="row">
                    <div class="col-md-6">Region</div>
                    <div class="col-md-6">{{ $county->region ?? 'Not Set' }}</div>
                </div>
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
    </div>
</div>
    
@endsection