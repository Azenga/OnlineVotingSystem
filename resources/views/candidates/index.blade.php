@extends('layouts.app')

@section('navbar')
<x-navbar />
@endsection

@section('content')
<div class="">
    <div class="container py-5">
        <div class="row justify-content-around">
            <div class="col-md-3 p-3">
                <div class="bg-white p-3 rounded">
                    @foreach ($positions as $position)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="position{{ $position->id }}">
                        <label class="form-check-label" for="position{{ $position->id }}">{{ $position->title }}</label>
                    </div>
                    @endforeach
                </div>

                <div class="bg-white p-3 mt-3 rounded">
                    @foreach ($levels as $level)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="level{{ $level->id }}">
                        <label class="form-check-label" for="level{{ $level->id }}">{{ $level->title }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-8">
                @foreach ($candidates as $candidate)
                    <div class="bg-white rounded d-flex mt-3 justify-content-between align-items-center">
                        <div class="">
                            <img width="160" class="rounded-left" src="{{ asset($candidate->user->image()) }}" alt="">
                        </div>
                        <div class="p-3">
                            <div class="text-dark font-weight-bold h5">{{ $candidate->user->name }}</div>
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
