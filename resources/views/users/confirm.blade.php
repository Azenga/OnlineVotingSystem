@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('content')

    <div class="container py-3">
        <h3 class="font-weight-bold">Confirm Selection</h3>
        <hr>

        <div>
            <div class="py-2">
                @error('candidature_id')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <form action="{{ route('vote.confirm') }}" method="POST">
                @csrf

                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>##</th>
                                <th>Position</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
            
                        <tbody>
                            @foreach ($candidatures as $candidature)
                                <tr>
                                    <td>{{ $candidature->position->id }}</td>
                                    <td>{{ $candidature->position->title }}</td>
                                    <td><img width="64" class="rounded-circle" src="{{ $candidature->user->image() }}" alt="Candidate Image" /></td>
                                    <td>{{ $candidature->user->name }}</td>
                                    <td>                                
                                        <a href="{{ route('vote', ['position' => $candidature->position->id]) }}" class="btn btn-sm btn-info btn-edit-level">
                                            <span>Change</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
    
@endsection