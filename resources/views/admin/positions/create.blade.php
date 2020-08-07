@extends('layouts.dashboard')

@section('title', 'Add Position')

@section('btn')
    <a href="{{ route('admin.positions.index') }}" class="btn btn-sm btn-primary">
        <i class="fa fa-long-arrow-alt-left"></i>
        <span>Back</span>
    </a>
@endsection

@section('content')

<div class="">
    <div class="">
    </div>

    <div class="py-3">
        <form class="row justify-content-center" action="{{ route('admin.positions.store') }}" method="post">
            <div class="col-md-10">
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
                    <label for="level-id" class="form-label">Select Level <span class="text-danger">*</span></label>
                    <select class="form-select @error('level_id') is-invalid @enderror" 
                        name="level_id" id="level-id" aria-label="Select a position">
                        <option selected disabled>Open this select menu</option>
                        @foreach ($levels as $level)
                            <option value="{{ $level->id }}" {{ (old('level_id') && ($level->id == old('level_id'))) ? 'selected' : '' }}>{{ $level->title }}</option>
                        @endforeach
                    </select>
                    @error('level_id')
                        <span class="text-danger d-block mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                        name="description" id="description" rows="3">
                        {{ old('description') }}
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