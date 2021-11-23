@extends('layouts.dashboard')

@section('title', 'Add Candidate')

@section('btn')
<a href="{{ route('admin.candidates.index') }}" class="btn btn-sm btn-primary">
    <i class="fa fa-long-arrow-alt-left"></i>
</a>
@endsection

@section('content')
<form action="{{ route('admin.candidates.store') }}" method="post">
    @csrf

    @if ($errors->any())
    <div class="alert alert-danger list-unstyled">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div>
        <add-candidate />
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection