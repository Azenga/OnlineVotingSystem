@extends('layouts.dashboard')

@section('title', 'Levels')

@section('btn')
    <a href="{{ route('admin.levels.create') }}" class="btn btn-sm btn-primary">Add Level</a>
@endsection


@section('content')
<div class="">
    <div class="">
        @if ($levels->count())
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-light">
                    <tr>
                        <th>##</th>
                        <th>Title</th>
                        <th>Positions</th>
                        <th>Updated</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($levels as $level)
                        <tr>
                            <td>{{ $level->id }}</td>
                            <td>{{ $level->title }}</td>
                            <td>{{ $level->positions->count() }}</td>
                            <td>{{ $level->updated_at->format('d/m/Y') }}</td>   
                            <td>{{ $level->created_at->format('d/m/Y') }}</td>
                            <td class="d-flex">                                
                                <button type="button" 
                                    class="btn btn-sm btn-info btn-edit-level" 
                                    data-id="{{ $level->id }}" data-toggle="modal" data-target="#edit-level">
                                    <i class="fa fa-edit"></i>
                                </button>                                
                                <button type="button" class="btn btn-sm btn-danger ml-3" data-toggle="modal" data-target="#delete-level">
                                    <i class="fa fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @include('partials.modals.admin.levels.edit')
            @include('partials.modals.admin.levels.delete')
        </div>
        @else
        <div class="d-flex justify-content-center align-items-center">
            <i class="fa fa-info-circle fa-2x text-info"></i>

            <span class="font-weight-bold ml-3">No levels added yet</span>
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