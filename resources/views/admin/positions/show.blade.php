@extends('layouts.dashboard')

@section('title', $position->title)

@section('btn')
    <a href="{{ route('admin.positions.index') }}" class="btn btn-sm btn-primary">
        <i class="fa fa-long-arrow-alt-left"></i>
    </a>
@endsection

@section('content')

<div class="">
    <div>
        <div class="row">
            <div class="col-md-6">Title</div>
            <div class="col-md-6 text-primary">{{ $position->title }}</div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">Level</div>
            <div class="col-md-6 text-primary">{{ $position->level->title }}</div>
        </div>
        <hr>
        <div>
            <h5 class="font-weight-bold text-secondary">Description</h5>
            <p>
                @if ($position->description)
                    {{ $position->description }}
                @else
                    <span class="text-muted">No description</span>
                @endif
            </p>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.positions.edit', $position) }}" class="btn btn-primary">
            <i class="fa fa-edit"></i>
            <span>Edit</span>
        </a>
        <form action="{{ route('admin.positions.destroy', $position) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger d-flex align-items-center ml-3">
                <i class="fa fa-trash-alt"></i>
                <span class="ml-2">Delete</span>
            </button>
        </form>
    </div>
</div>
    
@endsection