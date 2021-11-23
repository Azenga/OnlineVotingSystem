@extends('layouts.app')

@section('navbar')
<x-navbar />
@endsection

@section('styles')
    <style>
        .sidebar-sticky{
            position: sticky;
            top: 75px;
            max-height: 100vh;
        }

        body{
            overflow-x: hidden;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="py-5">
        
        <div class="row justify-content-around">
            <div class="col-md-3 p-3">
                <div class="sidebar-sticky">
                    <form action="" method="get">
                        <div class="bg-white p-3 rounded">
                            <div class="position-relative">
                                <div class="position-absolute p-2">
                                    <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                        <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                    </svg>
                                </div>
                                <input type="text" class="form-control pl-5" name="name" id="" placeholder="Aspirant Name...">
                            </div>
                        </div>
    
                        <div class="bg-white p-3 mt-3 rounded">
                            @foreach ($positions as $position)
                            <div class="form-check">
                                <input class="form-check-input" name="positions[]" type="checkbox" value="{{ $position->id }}" id="position{{ $position->id }}">
                                <label class="form-check-label" for="position{{ $position->id }}">{{ $position->title }}</label>
                            </div>
                            @endforeach
                        </div>
        
                        <div class="bg-white p-3 mt-3 rounded">
                            @foreach ($levels as $level)
                            <div class="form-check">
                                <input class="form-check-input" name="levels[]" type="checkbox" value="{{ $level->id }}" id="level{{ $level->id }}">
                                <label class="form-check-label" for="level{{ $level->id }}">{{ $level->title }}</label>
                            </div>
                            @endforeach
                        </div>
    
                        <div class="bg-white p-3 mt-3 rounded">
                            <button type="submit" class="btn btn-primary btn-block">Apply Filters</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                @foreach ($candidates as $candidate)
                    <div class="bg-white rounded d-flex mt-3 justify-content-between align-items-center">
                        <div class="">
                            <img width="160" class="rounded-left" src="{{ $candidate->user->image() }}" alt="Candidate Image">
                        </div>
                        <div class="p-3">
                            <div class="text-dark font-weight-bold h5"><a href="{{ route('candidates.show', $candidate) }}">{{ $candidate->user->name }}</a></div>
                            <div>{{ $candidate->user->nickname() }}</div>
                            <div class="text-muted">{{ $candidate->position->title }}</div>
                            <div class="text-primary">{{ $candidate->where() }}</div>
                        </div>
                        <div class="p-3">
                            <div class="font-weight-bold">{{ $candidate->party ?? 'Independent' }}</div>
                            <div>{{ $candidate->incumbent ? 'Incumbent' : 'New' }}</div>
                            <div>Since {{ $candidate->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
