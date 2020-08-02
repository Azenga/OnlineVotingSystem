@extends('layouts.app')

@section('content')

<div class="container">
    <div class="">
        <a href="{{ route('admin.positions.index') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-long-arrow-alt-left"></i>
        </a>
    </div>

    <div class="row justify-content-center py-3">
        <div class="col-md-8">
            <h4 class="font-weight-bold text-secondary">
                <span>{{ $position->title }}</span>
                <small class="text-muted">({{ $position->level->title }})</small>
            </h4>

            <div class="pt-3">
                <h5 class="font-weight-bold text-secondary">Description</h5>
                <p>
                    @if ($position->description)
                        {{ $position->description }}
                    @else
                        <span class="text-muted">No description</span>
                    @endif
                </p>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.positions.edit', $position) }}" class="btn btn-primary">
                    <i class="fa fa-edit"></i>
                    <span>Edit</span>
                </a>
                <form action="{{ route('admin.positions.destroy', $position) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger d-flex align-items-center ml-3">
                        <i class="fa fa-trash-alt"></i>
                        <span class="ml-2">Delete</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection