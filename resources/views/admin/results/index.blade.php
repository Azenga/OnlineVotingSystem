@extends('layouts.dashboard')

@section('title', 'Results Search')

@section('content')
<div class="rounded">
    <form action="{{ route('admin.results') }}" method="get">
        <search-voting-results/>
    </form>
</div>

<div>
    @if($candidates->count())
    <div class="table-responsive">

    </div>
    @else
    <div class="font-weight-bold">No candidates Added</div>
    @endif
</div>
@endsection