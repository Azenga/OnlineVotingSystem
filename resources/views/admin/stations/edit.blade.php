@extends('layouts.dashboard')

@section('title', 'Edit Station')

@section('btn')
<a href="{{ route('admin.stations.show', $station) }}" class="btn btn-sm btn-primary">
    <i class="fa fa-long-arrow-alt-left"></i>
</a>    
@endsection

@section('content')
<div>
    <form action="{{ route('admin.stations.update', $station) }}" method="post">
        <h4 class="font-weight-bold"></h4>
        @csrf
        @method('PATCH')
        <div class="mt-3">
            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" name="name" 
                class="form-control @error('name')is-invalid @enderror" 
                id="name" placeholder="County" value="{{ old('name') ?? $station->name }}">
            @error('name')
                <span class="text-danger d-block mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-3">
            <label for="user-id" class="form-label">Select Officers <span class="text-danger">*</span></label>
            <select class="form-select @error('user_id') is-invalid @enderror" 
                name="users_ids[]" id="user-id" aria-label="Select a position" multiple>
                <option selected disabled>Open this select menu</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ in_array($user->id, $station->workers->pluck('user_id')->toArray()) ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
            @error('users_ids.*')
                <span class="text-danger d-block mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="clearfix mt-3">
            <button type="submit" class="btn btn-primary float-right">Update</button>
        </div>
    </form>
</div>
@endsection