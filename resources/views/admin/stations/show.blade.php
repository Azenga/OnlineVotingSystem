@extends('layouts.app')

@section('content')

<div class="container">
    <div class="">
        <a href="{{ route('admin.stations.index') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-long-arrow-alt-left"></i>
        </a>
    </div>

    <div class="row justify-content-center py-3">
        <div class="col-md-10">
            <h4 class="font-weight-bolder text-secondary">
                <span>{{ $station->name }}</span>
            </h4>
            <hr>
            <div class="mt-3">

                <h5 class="font-weight-bold">Officers</h5>

                @if ($station->workers->count())
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Ward</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($station->workers as $worker)
                                    <tr>
                                        <td>{{ $worker->user->name }}</td>
                                        <td>{{ $worker->user->email }}</td>
                                        <td>{{ $worker->user->phone_number }}</td>
                                        <td>{{ $worker->user->ward->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fa fa-info-circle fa-2x text-info"></i>
            
                        <span class="font-weight-bold ml-3">No officers added yet</span>
                    </div>
                @endif
                
            </div>

            <div class="mt-3 d-flex justify-content-end">
                <a href="{{ route('admin.stations.edit', $station) }}" class="btn btn-primary">
                    <i class="fa fa-edit"></i>
                    <span>Edit</span>
                </a>
                <form action="{{ route('admin.stations.destroy', $station) }}" method="post">
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