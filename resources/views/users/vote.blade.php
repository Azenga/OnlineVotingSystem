@extends('layouts.app')

@section('navbar')
    <x-navbar />
@endsection

@section('content')

    <div class="container py-3">
        <h3 class="font-weight-bold">Voting Progress</h3>
        <hr>
        <div class="d-flex flex-column flex-md-row justify-content-between mt-3">
            @if ($positions->count())
                @foreach ($positions as $position)
                    <a href="" class="btn btn-primary mt-2 mt-md-0">{{ $position->title }}</a>
                @endforeach
            @else
            <div>No positions yet</div>
            @endif
        </div>
        <hr>

        <div>
            <form action="{{ route('vote') }}" method="POST">
                @csrf

                @foreach ($candidatures as $candidature)
                    <div>
                        {{ $candidature->user->name }}
                    </div>
                @endforeach
            </form>
        </div>
    </div>
    
@endsection