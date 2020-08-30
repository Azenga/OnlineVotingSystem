@extends('layouts.app')

@section('navbar')
<x-navbar />
@endsection

@section('styles')
<style>
    
    .h-screen{
        height: 100vh;
    }
    .w-screen{
        width: 100vw;
    }

</style>
@endsection

@section('content')

<div>
    <div class="h-screen w-screen d-flex align-items-center px-5">
        <div class="d-flex flex-column align-items-start">
            <h1 class="font-weight-bold">
                <span>Welcome Fellow Citizens, Register, Vote and Track Results Progress.</span>
                <br>
                <span class="text-primary">All In One Place</span>
            </h1>

            <a href="{{ route('login') }}" class="btn btn-lg btn-primary mt-5">Get Started</a>
        </div>
        <div>
            <img class="w-100" src="{{ asset('/img/svgs/voting.svg') }}" alt="Voting SVG">
        </div>
    </div>
</div>
@endsection
