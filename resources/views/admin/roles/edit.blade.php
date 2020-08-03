@extends('layouts.app')

@section('content')

<div class="container">
    <div class="">
        <a href="{{ route('admin.roles.show', $role) }}" class="btn btn-sm btn-primary">
            <i class="fa fa-long-arrow-alt-left"></i>
        </a>
    </div>

    <div class="py-3">
        <form class="row justify-content-center" action="{{ route('admin.roles.update', $role) }}" method="post">
            <div class="col-md-8">
                <h4 class="font-weight-bold">Edit Role</h4>
                @csrf
                @method('PATCH')
                <div class="mt-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" 
                        class="form-control @error('title')is-invalid @enderror" 
                        id="title" placeholder="Title..." value="{{ old('title') ?? $role->title }}">
                    @error('title')
                        <span class="text-danger d-block mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                        name="description" id="description" rows="3">
                        {{ old('description') ?? $role->description }}
                    </textarea>
                    @error('description')
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