@extends('layouts.dashboard')

@section('title', 'Edit County')

@section('btn')
<a href="{{ route('admin.counties.show', $county) }}" class="btn btn-sm btn-primary">
    <i class="fa fa-long-arrow-alt-left"></i>
</a>    
@endsection

@section('content')
<div>
    <form action="{{ route('admin.counties.update', $county) }}" method="post">
        <h4 class="font-weight-bold"></h4>
        @csrf
        @method('PATCH')

        <div class="mt-3">
            <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
            <input type="text" name="name" 
                class="form-control @error('name')is-invalid @enderror" 
                id="name" placeholder="County" value="{{ old('name') ?? $county->name }}">
            @error('name')
                <span class="text-danger d-block mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-3">
            <label for="region" class="form-label">Region<span class="text-danger">*</span></label>
            <input type="text" name="region" 
                class="form-control @error('region')is-invalid @enderror" 
                id="region" placeholder="County" value="{{ old('region') ?? $county->region }}">
            @error('region')
                <span class="text-danger d-block mt-1">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="clearfix mt-3">
            <button type="submit" class="btn btn-primary float-right">Update</button>
        </div>
    </form>
</div>
    
@endsection