@extends('layouts.dashboard')

@section('title', 'Edit User')

@section('btn')
<a href="{{ route('officer.users.show', $user) }}" class="btn btn-sm btn-primary">
    <i class="fa fa-long-arrow-alt-left"></i>
</a>    
@endsection

@section('content')
<form action="{{ route('officer.users.update', $user) }}" method="post">
    @csrf
    @method('PATCH')

    <div class="mt-3">
        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
        <input type="text" name="name" 
            class="form-control @error('name')is-invalid @enderror" 
            id="name" placeholder="County" value="{{ old('name') ?? $user->name }}">
        @error('name')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="mt-3">
        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
        <input type="email" name="email" 
            class="form-control @error('email')is-invalid @enderror" 
            id="email" placeholder="County" value="{{ old('email') ?? $user->email }}">
        @error('email')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="mt-3">
        <label for="phone-number" class="form-label">Phone Number <span class="text-danger">*</span></label>
        <input type="text" name="phone_number" 
            class="form-control @error('phone_number')is-invalid @enderror" 
            id="phone-number" placeholder="County" value="{{ old('phone_number') ?? $user->phone_number }}">
        @error('phone_number')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-3">
        <label for="national_id_number" class="form-label">National ID Number <span class="text-danger">*</span></label>
        <input type="text" name="national_id_number" 
            class="form-control @error('national_id_number')is-invalid @enderror" 
            id="national_id_number" placeholder="County" value="{{ old('national_id_number') ?? $user->national_id_number }}">
        @error('national_id_number')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-3">
        <label for="role-id" class="form-label">Role<span class="text-danger">*</span></label>
        <select class="form-select @error('role_id') is-invalid @enderror" 
            name="role_id" id="role-id" aria-label="Select a position">
            <option selected disabled>Select User Role</option>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" {{ ((old('role_id') ?? $user->role_id) && ($role->id == (old('role_id') ?? $user->role_id))) ? 'selected' : '' }}>{{ $role->title }}</option>
            @endforeach
        </select>
        @error('role_id')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>

    <div class="mt-3">
        <label for="ward-id" class="form-label">Ward<span class="text-danger">*</span></label>
        <select class="form-select @error('ward_id') is-invalid @enderror" 
            name="ward_id" id="ward-id" aria-label="Select a position">
            <option selected disabled>Select User Ward (Location)</option>
            @foreach ($wards as $ward)
                <option value="{{ $ward->id }}" {{ ((old('ward_id') ?? $user->ward_id) && ($ward->id == (old('ward_id') ?? $user->ward_id))) ? 'selected' : '' }}>{{ $ward->name }}</option>
            @endforeach
        </select>
        @error('ward_id')
            <span class="text-danger d-block mt-1">{{ $message }}</span>
        @enderror
    </div>   
    
    <div class="form-check mt-3">
        <input class="form-check-input" type="checkbox" id="active-checkbox"
        {{ (old('isactive') ?? $user->isactive)  ? 'checked' : '' }}>
        <label class="form-check-label" for="active-checkbox">
            Is Active
        </label>
    </div>    
    
    <div class="form-check mt-3">
        <input class="form-check-input" type="checkbox" id="alive-checkbox"
        {{ (old('isalive') ?? $user->isalive)  ? 'checked' : '' }}>
        <label class="form-check-label" for="alive-checkbox">
            Is Alive
        </label>
    </div>    
    
    <div class="form-check mt-3">
        <input class="form-check-input" type="checkbox" id="voted-checkbox"
        {{ (old('hasvoted') ?? $user->hasvoted)  ? 'checked' : '' }}>
        <label class="form-check-label" for="voted-checkbox">
            Has Voted
        </label>
    </div>
    <div class="clearfix mt-3">
        <button type="submit" class="btn btn-primary float-right">Update</button>
    </div>
</form>
@endsection