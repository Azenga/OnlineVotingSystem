@extends('layouts.app')

@section('content')

<div class="container">
    <div class="">
        <a href="{{ route('admin.counties.show', $county) }}" class="btn btn-sm btn-primary">
            <i class="fa fa-long-arrow-alt-left"></i>
        </a>
    </div>

    <div class="py-3">
        <form class="row justify-content-center" action="{{ route('admin.counties.update', $county) }}" method="post">
            <div class="col-md-8">
                <h4 class="font-weight-bold">Edit County</h4>
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
            </div>
        </form>
    </div>
</div>
    
@endsection