@extends('layouts.app')

@section('navbar')
<x-navbar />
@endsection

@section('styles')
<style>
    .top-75{
        margin: 75px;
    }
</style>
@endsection

@section('content')
<div class="top-75">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
