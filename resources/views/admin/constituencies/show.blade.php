@extends('layouts.app')

@section('content')

<div class="container">
    <div class="">
        <a href="{{ route('admin.constituencies.index') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-long-arrow-alt-left"></i>
        </a>
    </div>

    <div class="row justify-content-center py-3">
        <div class="col-md-8">
            <h4 class="font-weight-bold text-secondary">
                <span>{{ $constituency->name }}</span>
                <small class="text-muted">({{ $constituency->county->name }})</small>
            </h4>

            <div class="pt-3">
                <h5 class="font-weight-bold text-secondary">Description</h5>
                <p>
                    @if ($constituency->description)
                        {{ $constituency->description }}
                    @else
                        <span class="text-muted">No description</span>
                    @endif
                </p>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.constituencies.edit', $constituency) }}" class="btn btn-primary">
                    <i class="fa fa-edit"></i>
                    <span>Edit</span>
                </a>
                <form action="{{ route('admin.constituencies.destroy', $constituency) }}" method="post">
                    @csrf
                    @method('DELETE')
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