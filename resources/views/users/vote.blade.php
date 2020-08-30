@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('content')

    <div class="container py-3">
        <h3 class="font-weight-bold">Voting Progress</h3>
        <hr>
        
        <hr>
        <div class="d-flex flex-column flex-md-row justify-content-between mt-3">
            @if ($positions->count())
                @foreach ($positions as $position)
                    <a href="{{ route('vote', ['position' => $position->id]) }}" class="btn btn-primary mt-2 mt-md-0">{{ $position->title }}</a>
                @endforeach
            @else
            <div>No positions yet</div>
            @endif
        </div>
        <hr>

        <div>
            <div class="py-2">
                @error('candidature_id')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <form action="{{ route('vote') }}" method="POST">
                @csrf

                <div class="row flex-wrap">
                    @foreach ($candidatures as $candidature)
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="{{ Storage::disk('s3')->url($candidature->user->image()) }}" alt="User Profile Image">

                            <div class="card-body">
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="radio" name="candidature_id" id="candidateRadio{{ $candidature->id }}"
                                        value="{{ $candidature->id }}">
                                    <label class="form-check-label" for="candidateRadio{{ $candidature->id }}">
                                        {{ $candidature->user->name }}
                                    </label>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">
                        Next
                    </button>
                </div>
            </form>
        </div>
    </div>
    
@endsection