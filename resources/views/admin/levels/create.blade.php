@extends('layouts.app')

@section('content')

<div class="container">
    <div class="">
        <a href="{{ route('admin.levels.index') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-long-arrow-alt-left"></i>
        </a>
    </div>

    <div class="py-3">
        <form class="row justify-content-center" action="{{ route('admin.levels.store') }}" method="post">
            <div class="col-md-8">
                <h4 class="font-weight-bold">Add Level</h4>
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
            </div>
        </form>
    </div>
</div>
    
@endsection