@extends('layouts.app')

@section('content')

<div class="container">
    <div class="">
        <a href="{{ route('admin.roles.index') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-long-arrow-alt-left"></i>
        </a>
    </div>

    <div class="row justify-content-center py-3">
        <div class="col-md-8">
            <h4 class="font-weight-bolder text-secondary">
                <span>{{ $role->title }}</span>
            </h4>

            <div class="mt-3">
                <h5 class="font-weight-bold">Description</h5>

                <p>{{ $role->description }}</p>
            </div>
            <hr>
            <div class="mt-3">
                <h5 class="font-weight-bold">Permissions</h5>
                
                @if ($role->permissions->count())
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>##</th>
                                <th>Title</th>
                                <th>Upadated</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
            
                        <tbody>
                            @foreach ($role->permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->title }}</td>
                                    <td>{{ $permission->updated_at->format('d/m/Y') }}</td>   
                                    <td>{{ $permission->created_at->format('d/m/Y') }}</td>
                                    <td>                                
                                        <form action="{{ route('admin.roles.permissions.destroy', ['role' => $role->id, 'permission' => $permission->id]) }}" method="post">
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
        
                    <span class="font-weight-bold ml-3">No permissions added yet</span>
                </div>
                @endif
            </div>

            <div class="mt-3 d-flex justify-content-end">
                <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-primary">
                    <i class="fa fa-edit"></i>
                    <span>Edit</span>
                </a>
                <form action="{{ route('admin.roles.destroy', $role) }}" method="post">
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