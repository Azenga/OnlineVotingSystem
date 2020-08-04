@extends('layouts.app')

@section('content')

<div class="container">
    <div class="">
        <a href="{{ route('admin.candidates.index') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-long-arrow-alt-left"></i>
        </a>
    </div>

    <div class="py-3">
        <form class="row justify-content-center" action="{{ route('admin.candidates.store') }}" method="post">
            <div class="col-md-8">
                <h4 class="font-weight-bold">Add Candidate</h4>
                @csrf

                <div>
                    <add-candidate />
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
    
@endsection