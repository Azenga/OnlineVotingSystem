@extends('layouts.dashboard')

@section('title', 'Add Permission')

@section('btn')
<a href="{{ route('admin.permissions.index') }}" class="btn btn-sm btn-primary">
    <i class="fa fa-long-arrow-alt-left"></i>
</a>    
@endsection

@section('content')
<form action="{{ route('admin.permissions.store') }}" method="post">
    <h4 class="font-weight-bold"></h4>
    @csrf
    <div class="mt-3">
        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
        <input type="text" name="title" 
            class="form-control @error('title')is-invalid @enderror" 
            id="title" placeholder="Title..." value="{{ old('title') }}">
        @error('title')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection