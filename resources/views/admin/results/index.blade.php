@extends('layouts.dashboard')

@section('title', 'Results Search')

@section('content')
<div class="rounded">
    <form action="{{ route('admin.results') }}" method="get">
        <search-voting-results/>
    </form>
</div>

<div>
    @if($results->count())
        <div class="table-responsive py-3">
            <table class="table text-center table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Vote Count</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td>{{ $result->candidate->user->name }}</td>
                            <td>{{ $result->votes }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="font-weight-bold text-center py-3">No results Found</div>
    @endif
</div>
@endsection