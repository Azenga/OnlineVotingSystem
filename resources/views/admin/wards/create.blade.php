@extends('layouts.dashboard')

@section('title', 'Add Ward')

@section('btn')
<a href="{{ route('admin.wards.index') }}" class="btn btn-sm btn-primary">
    <i class="fa fa-long-arrow-alt-left"></i>
</a>
@endsection

@section('content')
<form action="{{ route('admin.wards.store') }}" method="post">
    @csrf
    <div class="mt-3">
        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
        <input type="text" name="name" 
            class="form-control @error('name')is-invalid @enderror" 
            id="name" placeholder="Name.." value="{{ old('name') }}">
        @error('name')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>


    <div class="mt-3">
        <label for="constituency-id" class="form-label">Select Constituency<span class="text-danger">*</span></label>
        <select class="form-select @error('constituency_id') is-invalid @enderror" 
            name="constituency_id" id="constituency-id" aria-label="Select a position">
            <option selected disabled>Select a Constituency</option>
            @foreach ($constituencies as $constituency)
                <option value="{{ $constituency->id }}" 
                    {{ (old('constituency_id') && ($constituency->id == old('constituency_id'))) ? 'selected' : '' }}>
                    {{ $constituency->name }}
                </option>
            @endforeach
        </select>
        @error('constituency_id')
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
</form>
@endsection