@extends('layouts.dashboard')

@section('title', 'Add Level')

@section('btn')
    <a href="{{ route('admin.levels.index') }}" class="btn btn-sm btn-primary">
        <i class="fa fa-long-arrow-alt-left"></i>
        <span>Back</span>
    </a>
@endsection

@section('content')

<div class="">
    <div>
        <form action="{{ route('admin.levels.store') }}" method="post">
            @csrf
            <div class="mt-3">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" name="title" 
                    class="form-control @error('title')is-invalid @enderror" 
                    id="title" placeholder="Title...">
                @error('title')
                    <span class="text-danger d-block mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
    
@endsection