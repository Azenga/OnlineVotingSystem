@extends('layouts.dashboard')

@section('title', 'Permissions')

@section('btn')
<a href="{{ route('admin.permissions.create') }}" class="btn btn-sm btn-primary">Add Permission</a>
@endsection

@section('content')
<div>
    @if ($permissions->count())
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
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->id }}</td>
                        <td>{{ $permission->title }}</td>
                        <td>{{ $permission->updated_at->format('d/m/Y') }}</td>   
                        <td>{{ $permission->created_at->format('d/m/Y') }}</td>
                        <td>                                
                            <form action="{{ route('admin.permissions.destroy', $permission) }}" method="post">
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
@endsection

@section('scripts')
<script>
    console.log('Hello, you are in permissions index')
</script>
@endsection