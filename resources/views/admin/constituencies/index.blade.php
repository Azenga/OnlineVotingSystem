@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center">
        <h4 class="font-weight-bold">Constituencies</h4>
        <a href="{{ route('admin.constituencies.create') }}" class="btn btn-sm btn-primary">Add Constituency</a>
    </div>

    <div class="py-3">

        @if ($constituencies->count())
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-light">
                    <tr>
                        <th>##</th>
                        <th>Name</th>
                        <th>County</th>
                        <th>Updated</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($constituencies as $constituency)
                        <tr>
                            <td>{{ $constituency->id }}</td>
                            <td>{{ $constituency->name }}</td>
                            <td>{{ $constituency->county->name }}</td>
                            <td>{{ $constituency->updated_at }}</td>   
                            <td>{{ $constituency->created_at }}</td>
                            <td class="d-flex">                                
                                <a href="{{ $constituency->path() }}" class="btn btn-sm btn-info btn-edit-level">
                                    <i class="fa fa-eye"></i>
                                </a>  
                                
                                <form action="{{ route('admin.constituencies.destroy', $constituency) }}" method="post">
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

            <span class="font-weight-bold ml-3">No constituencies added yet</span>
        </div>
        @endif
    </div>

</div> <!-- /.container -->
@endsection

@section('scripts')
    
<script>
    
    console.log('Hello, you are in level index')
    
</script>
@endsection