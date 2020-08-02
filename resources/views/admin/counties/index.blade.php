@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center">
        <h4 class="font-weight-bold">Counties</h4>
        <a href="{{ route('admin.counties.create') }}" class="btn btn-sm btn-primary">Add County</a>
    </div>

    <div class="py-3">

        @if ($counties->count())
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-light">
                    <tr>
                        <th>##</th>
                        <th>Name</th>
                        <th>Region</th>
                        <th>Updated</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($counties as $county)
                        <tr>
                            <td>{{ $county->id }}</td>
                            <td>{{ $county->name }}</td>
                            <td>{{ $county->region }}</td>
                            <td>{{ $county->updated_at }}</td>   
                            <td>{{ $county->created_at }}</td>
                            <td class="d-flex">                                
                                <a href="{{ $county->path() }}" class="btn btn-sm btn-info btn-edit-level">
                                    <i class="fa fa-eye"></i>
                                </a>     
                                
                                <form action="{{ route('admin.counties.destroy', $county) }}" method="post">
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

            <span class="font-weight-bold ml-3">No counties added yet</span>
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