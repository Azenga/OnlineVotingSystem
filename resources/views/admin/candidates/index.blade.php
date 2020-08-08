@extends('layouts.dashboard')

@section('title', 'Candidates')

@section('btn')
<a href="{{ route('admin.candidates.create') }}" class="btn btn-sm btn-primary">Add Candidates</a>
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
                    <th>Position</th>
                    <th>Location</th>
                    <th>Since</th>
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
                        <td>{{ $user->candidature->getPosition() }}</td>
                        <td>{{ $user->candidature->where() }}</td>
                        <td>{{ $user->candidature->created_at->format('d/m/Y') }}</td>
                        <td class="d-flex">                                
                            <a href="{{ route('admin.candidates.show', $user->id) }}" class="btn btn-sm btn-info btn-edit-level">
                                <i class="fa fa-eye"></i>
                            </a>     
                            
                            <form action="{{ route('admin.candidates.destroy', $user->id) }}" method="post">
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

        <span class="font-weight-bold ml-3">No candidates added yet</span>
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    console.log('Hello, you are in counties index')
</script>
@endsection