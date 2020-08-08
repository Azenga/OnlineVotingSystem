@extends('layouts.dashboard')

@section('title', 'Edit Candidature')

@section('btn')
<a href="{{ route('admin.candidates.show', $user->id) }}" class="btn btn-sm btn-primary">
    <i class="fa fa-long-arrow-alt-left"></i>
</a>
@endsection

@section('content')
<form action="{{ route('admin.candidates.update', $user->id) }}" method="post">
    @csrf
    @method('PATCH')

    <div class="mt-3">
        <label for="position-id" class="form-label"><span class="text-danger">*</span></label>
        <select class="form-select @error('position_id') is-invalid @enderror" 
            name="position_id" id="position-id" aria-label="Select a position">
            <option selected disabled>Select User Role</option>
            @foreach ($positions as $position)
                <option value="{{ $position->id }}" {{ ((old('position_id') ?? $user->candidature->position_id) && ($position->id == (old('position_id') ?? $user->candidature->position_id))) ? 'selected' : '' }}>{{ $position->title }}</option>
            @endforeach
        </select>
        @error('position_id')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>    

    <div class="mt-3">
        <label for="party" class="form-label">Party</label>
        <input type="text" name="party" 
            class="form-control @error('party')is-invalid @enderror" 
            id="party" placeholder="Party..." value="{{ old('party') ?? $user->candidature->party }}">
        @error('party')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="voted-checkbox" name="incumbent"
            {{ (old('incumbent') ?? $user->candidature->incumbent)  ? 'checked' : '' }}>
            <label class="form-check-label" for="voted-checkbox">
                Incumbent
            </label>
        </div>
        @error('incumbent')
        <span class="text-danger d-block mt-1">{{ $message }}</span>
    @enderror
    </div>
    <div class="clearfix mt-3">
        <button type="submit" class="btn btn-primary float-right">Update</button>
    </div>
</form>
@endsection