@extends('layouts.dashboard')

@section('title', 'Positions')

@section('btn')
    <a href="{{ route('admin.positions.create') }}" class="btn btn-sm btn-primary">Add Position</a>
@endsection

@section('content')
<div class="">
    <div class="">

        @if ($positions->count())
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-light">
                    <tr>
                        <th>##</th>
                        <th>Title</th>
                        <th>Updated</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($positions as $position)
                        <tr>
                            <td>{{ $position->id }}</td>
                            <td>{{ $position->title }} <small class="text-muted">({{ $position->level->title }})</small></td>
                            <td>{{ $position->updated_at->format('d/m/Y') }}</td>   
                            <td>{{ $position->created_at->format('d/m/Y') }}</td>
                            <td class="d-flex">                                
                                <a href="{{ $position->path() }}" class="btn btn-sm btn-info btn-edit-level">
                                    <i class="fa fa-eye"></i>
                                </a>  
                                
                                <form action="{{ route('admin.positions.destroy', $position) }}" method="post">
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

            <span class="font-weight-bold ml-3">No positions added yet</span>
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