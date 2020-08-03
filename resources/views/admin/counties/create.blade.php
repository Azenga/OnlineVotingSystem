@extends('layouts.app')

@section('content')

<div class="container">
    <div class="">
        <a href="{{ route('admin.counties.index') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-long-arrow-alt-left"></i>
        </a>
    </div>

    <div class="py-3">
        <form class="row justify-content-center" action="{{ route('admin.counties.store') }}" method="post">
            <div class="col-md-8">
                <h4 class="font-weight-bold">Add County</h4>
                @csrf
                <div class="mt-3">
                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" 
                        class="form-control @error('name')is-invalid @enderror" 
                        id="name" placeholder="Name..." value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger d-block mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="region" class="form-label">Region</label>
                    <input type="text" name="region" 
                        class="form-control @error('region')is-invalid @enderror" 
                        id="region" placeholder="Region" value="{{ old('region') }}">
                    @error('region')
                        <span class="text-danger d-block mt-1">{{ $message }}</span>
                    @enderror
                </div>



                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
    
@endsection