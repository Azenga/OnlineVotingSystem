@extends('layouts.dashboard')

@section('title', 'Add User')

@section('btn')
<a href="{{ route('officer.users.index') }}" class="btn btn-sm btn-primary">
    <i class="fa fa-long-arrow-alt-left"></i>
</a>    
@endsection

@section('content')
<form action="{{ route('officer.users.store') }}" method="post">
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
    
    <div class="mt-3">
        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
        <input type="email" name="email" 
            class="form-control @error('email')is-invalid @enderror" 
            id="email" placeholder="Email..." value="{{ old('email') }}">
        @error('email')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="mt-3">
        <label for="phone-number" class="form-label">Phone Number <span class="text-danger">*</span></label>
        <input type="text" name="phone_number" 
            class="form-control @error('phone_number')is-invalid @enderror" 
            id="phone-number" placeholder="Phone Number ..." value="{{ old('phone_number') }}">
        @error('phone_number')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-3">
        <label for="national_id_number" class="form-label">National ID Number <span class="text-danger">*</span></label>
        <input type="text" name="national_id_number" 
            class="form-control @error('national_id_number')is-invalid @enderror" 
            id="national_id_number" placeholder="ID Number..." value="{{ old('national_id_number') }}">
        @error('national_id_number')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>

    {{-- <div class="mt-3">
        <label for="ward-id" class="form-label">Ward<span class="text-danger">*</span></label>
        <select class="form-select @error('ward_id') is-invalid @enderror" 
            name="ward_id" id="ward-id" aria-label="Select a position">
            <option selected disabled>Select User Ward (Location)</option>
            @foreach ($wards as $ward)
                <option value="{{ $ward->id }}" {{ (old('ward_id') == $ward->id) ? 'selected' : '' }}>{{ $ward->name }}</option>
            @endforeach
        </select>
        @error('ward_id')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>    --}}
    
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection