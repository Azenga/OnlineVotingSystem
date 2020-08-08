@extends('layouts.dashboard')

@section('title', 'Voters')

@section('btn')
<a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary">Add Voter</a>
@endsection

@section('content')
<div>
    @if ($users->count())
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-light">
                <tr>
                    <th>##</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>ID Number</th>
                    <th>Alive</th>
                    <th>Voted</th>
                    <th>Upadated</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->national_id_number }}</td>
                        <td>{{ $user->isalive ? 'Alive' : 'Dead' }}</td>
                        <td>{{ $user->hasvoted ? 'True' : 'False' }}</td>
                        <td>{{ $user->updated_at->format('d/m/Y') }}</td>   
                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                        <td class="d-flex">                                
                            <a href="{{ $user->path() }}" class="btn btn-sm btn-info btn-edit-level">
                                <i class="fa fa-eye"></i>
                            </a>     
                            <form action="{{ route('admin.users.destroy', $user) }}" method="post">
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

        <span class="font-weight-bold ml-3">No users added yet</span>
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    console.log('Hello, you are in voters index')
</script>
@endsection