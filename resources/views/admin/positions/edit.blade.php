@extends('layouts.dashboard')

@section('title', 'Edit Position')

@section('btn')
<a href="{{ route('admin.positions.show', $position) }}" class="btn btn-sm btn-primary">
    <i class="fa fa-long-arrow-alt-left"></i>
</a>
@endsection

@section('content')

<div>
    <form action="{{ route('admin.positions.update', $position) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="mt-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" 
                class="form-control @error('title')is-invalid @enderror" 
                id="title" placeholder="County" value="{{ old('title') ?? $position->title }}">
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
                    <option value="{{ $level->id }}" {{ ((old('level_id') ?? $position->level_id) && ($level->id == (old('level_id') ?? $position->level_id))) ? 'selected' : '' }}>{{ $level->title }}</option>
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
                {{ old('description') ?? $position->description }}
            </textarea>
            @error('description')
                <span class="text-danger d-block mt-1">{{ $message }}</span>
            @enderror
        </div>
        <div class="clearfix mt-3">
            <button type="submit" class="btn btn-primary float-right">Update</button>
        </div>
    </form>
</div>
    
@endsection