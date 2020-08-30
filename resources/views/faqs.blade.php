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

<div class="container top-75">

    <h4 class="font-weight-bold">FAQs</h4>

    <div>
        <div class="accordion" id="quiz1">
            <div class="d-flex justify-content-between align-items-center w-100   ">
                <h4 class="mb-0">What is the general voting Registeration procedure?</h4>
                    <button class="btn" type="button" data-toggle="collapse"
                        data-target="#procedure" aria-expanded="true" aria-controls="quiz1">
                        <i class="fa fa-plus"></i>
                    </button>
            </div>

            <div id="procedure" class="collapse" data-parent="#quiz1">
                <ul class="py-3">
                    <li>Register at the station nearest to you a soon as possible, wait for voting</li>
                    <li>Voting as soon as possible on the voting day, online</li>
                </ul>
            </div>
        </div>
    </div>

</div>
    
@endsection