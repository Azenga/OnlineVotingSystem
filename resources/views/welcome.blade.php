@extends('layouts.app')

@section('navbar')
<x-navbar />
@endsection

@section('content')

<div class="container">

    <h1 class="text-center font-weight-bold">{{ config('app.name', 'Online Voting System') }}</h1>

</div>
    
@endsection