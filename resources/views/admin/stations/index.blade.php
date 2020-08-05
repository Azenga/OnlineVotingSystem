@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center">
        <h4 class="font-weight-bold">Stations</h4>
        <a href="{{ route('admin.stations.create') }}" class="btn btn-sm btn-primary">Add Station</a>
    </div>

    <div class="py-3">

        @if ($stations->count())
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-light">
                    <tr>
                        <th>##</th>
                        <th>Name</th>
                        <th>Officers</th>
                        <th>Upadated</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($stations as $station)
                        <tr>
                            <td>{{ $station->id }}</td>
                            <td>{{ $station->name }}</td>
                            <td>{{ $station->workers->count() }}</td>
                            <td>{{ $station->updated_at->format('d/m/Y') }}</td>   
                            <td>{{ $station->created_at->format('d/m/Y') }}</td>
                            <td class="d-flex">                                
                                <a href="{{ $station->path() }}" class="btn btn-sm btn-info btn-edit-level">
                                    <i class="fa fa-eye"></i>
                                </a>     
                                
                                <form action="{{ route('admin.stations.destroy', $station) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger ml-3">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="d-flex justify-content-center align-items-center">
            <i class="fa fa-info-circle fa-2x text-info"></i>

            <span class="font-weight-bold ml-3">No stations added yet</span>
        </div>
        @endif
    </div>

</div> <!-- /.container -->
@endsection

@section('scripts')
    
<script>
    
    console.log('Hello, you are in counties index')
    
</script>
@endsection