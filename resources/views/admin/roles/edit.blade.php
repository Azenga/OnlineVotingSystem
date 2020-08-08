@extends('layouts.dashboard')

@section('title', 'Edit Role')

@section('btn')
<a href="{{ route('admin.roles.show', $role) }}" class="btn btn-sm btn-primary">
    <i class="fa fa-long-arrow-alt-left"></i>
</a>
@endsection

@section('content')
<form action="{{ route('admin.roles.update', $role) }}" method="post">
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
        <label for="permissions-id" class="form-label">Select Permissions</label>
        <select multiple class="form-select"
            name="permissions_ids[]" id="permissions-id" aria-label="Select a position">
            <option selected disabled>Select Permissions...</option>

            @foreach ($permissions as $permission)
                <option value="{{ $permission->id }}"
                    {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $permission->title }}
                </option>
            @endforeach
        </select>
        @error('permissions_ids.*')
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
</form>
@endsection