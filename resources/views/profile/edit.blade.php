@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 py-4">
                <div class="text-center">
                    <span class="h3 text-gray-700 font-weight-bold ml-3">Edit Profile</span>
                </div>
                <form action="{{ route('profile.update', $user) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mt-3">
                        <input class="form-control @error('name') is-invalid @enderror" 
                            type="text" name="name" id="name" 
                            placeholder="Name..." value="{{ old('name') ?? $user->name }}" />
                    </div>
                    <div class="mt-3">
                        <input class="form-control @error('phone_number') is-invalid @enderror" 
                            type="text" name="phone_number" id="phone_number" 
                            placeholder="Phone Number..." value="{{ old('phone_number') ?? $user->phone_number }}" />
                    </div>
                    <div class="mt-3">
                        <input class="form-control @error('nickname') is-invalid @enderror" 
                            type="text" name="nickname" id="nickname" value="{{ old('nickname') }}" 
                            placeholder="Nickname..." />
                    </div>
                    <div class="mt-3">
                        <input class="@error('image') is-invalid @enderror"
                                type="file" name="image" id="image">
                    </div>
                    <div class="clearfix mt-3">
                        <button class="btn btn-primary float-right" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection