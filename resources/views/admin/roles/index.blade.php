@extends('layouts.dashboard')

@section('title', 'Roles')

@section('btn')
<a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary">Add Role</a>
@endsection

@section('content')
<div>
    @if ($roles->count())
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-light">
                <tr>
                    <th>##</th>
                    <th>Title</th>
                    <th>Permissions</th>
                    <th>Description</th>
                    <th>Upadated</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->title }}</td>
                        <td>{{ $role->permissions->count() }}</td>
                        <td>{{ $role->description }}</td>
                        <td>{{ $role->updated_at->format('d/m/Y') }}</td>   
                        <td>{{ $role->created_at->format('d/m/Y') }}</td>
                        <td class="d-flex">                                
                            <a href="{{ $role->path() }}" class="btn btn-sm btn-info btn-edit-level">
                                <i class="fa fa-eye"></i>
                            </a>     
                            
                            <form action="{{ route('admin.roles.destroy', $role) }}" method="post">
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

        <span class="font-weight-bold ml-3">No roles added yet</span>
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    console.log('Hello, you are in counties index')
</script>
@endsection