@extends('layouts.dashboard')

@section('title', 'Edit Constituency')

@section('btn')
<a href="{{ route('admin.constituencies.index') }}" class="btn btn-sm btn-primary">
    <i class="fa fa-long-arrow-alt-left"></i>
</a>    
@endsection

@section('content')
<form action="{{ route('admin.constituencies.update', $constituency) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="mt-3">
        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
        <input type="text" name="name" 
            class="form-control @error('name')is-invalid @enderror" 
            id="name" placeholder="Name..." value="{{ old('name') ?? $constituency->name }}">
        @error('name')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-3">
        <label for="county-id" class="form-label">Select County <span class="text-danger">*</span></label>
        <select class="form-select @error('county_id') is-invalid @enderror" 
            name="county_id" id="county-id" aria-label="Select a county">
            <option selected disabled>Select a county please</option>
            @foreach ($counties as $county)
                <option value="{{ $county->id }}" {{ ((old('county_id') ?? $constituency->county_id) && ($county->id == (old('county_id') ?? $constituency->county_id))) ? 'selected' : '' }}>{{ $county->name }}</option>
            @endforeach
        </select>
        @error('county_id')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>
    <div class="mt-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" 
            name="description" id="description" rows="3">
            {{ old('description') ?? $constituency->description }}
        </textarea>
        @error('description')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>
    <div class="clearfix mt-3">
        <button type="submit" class="btn btn-primary float-right">Update</button>
    </div>
</form>
@endsection