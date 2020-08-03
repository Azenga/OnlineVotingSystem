@extends('layouts.app')

@section('content')

<div class="container">
    <div class="">
        <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-long-arrow-alt-left"></i>
        </a>
    </div>

    <div class="py-3">
        <form class="row justify-content-center" action="{{ route('admin.users.store') }}" method="post">
            <div class="col-md-8">
                <h4 class="font-weight-bold">Add User</h4>
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

                <div class="mt-3">
                    <label for="role-id" class="form-label">Role<span class="text-danger">*</span></label>
                    <select class="form-select @error('role_id') is-invalid @enderror" 
                        name="role_id" id="role-id" aria-label="Select a position">
                        <option selected disabled>Select User Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->title }}</option>
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
                            <option value="{{ $ward->id }}" {{ (old('ward_id') == $ward->id) ? 'selected' : '' }}>{{ $ward->name }}</option>
                        @endforeach
                    </select>
                    @error('ward_id')
                        <span class="text-danger d-block mt-1">{{ $message }}</span>
                    @enderror
                </div>   
                
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
    
@endsection