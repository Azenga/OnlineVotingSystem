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
    <h4 class="font-weight-bold">Voting Results</h4>


    @if($results->count())
        <div class="table-responsive py-3">
            <table class="table text-center">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th>Name</th>
                        <th>Vote Count</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr class="{{ $result->candidate->getColor() }}">
                            <td>{{ $result->candidate->user->name }}</td>
                            <td>{{ $result->votes }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="font-weight-bold text-center py-3">No results Found In Your Area</div>
    @endif
</div>    
@endsection