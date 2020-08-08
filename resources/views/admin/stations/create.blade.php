@extends('layouts.dashboard')

@section('title', 'Add Station')

@section('btn')
<a href="{{ route('admin.stations.index') }}" class="btn btn-sm btn-primary">
    <i class="fa fa-long-arrow-alt-left"></i>
</a>    
@endsection
@section('content')
<div>
    <form class="row justify-content-center" action="{{ route('admin.stations.store') }}" method="post">
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

        <div>
            <add-station />
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
    
@endsection