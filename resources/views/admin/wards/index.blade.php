@extends('layouts.dashboard')

@section('title', 'Wards')

@section('btn')
<a href="{{ route('admin.wards.create') }}" class="btn btn-sm btn-primary">Add Ward</a>
@endsection

@section('content')
<div>
    @if ($wards->count())
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-light">
                <tr>
                    <th>##</th>
                    <th>Name</th>
                    <th>Voters</th>
                    <th>Consitituency</th>
                    <th>County</th>
                    <th>Updated</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($wards as $ward)
                    <tr>
                        <td>{{ $ward->id }}</td>
                        <td>{{ $ward->name }}</td>
                        <td>{{ $ward->users->count() }}</td>
                        <td>{{ $ward->constituency->name }}</td>
                        <td>{{ $ward->constituency->county->name }}</td>
                        <td>{{ $ward->updated_at->format('d/m/Y') }}</td>   
                        <td>{{ $ward->created_at->format('d/m/Y') }}</td>
                        <td class="d-flex">                                
                            <a href="{{ $ward->path() }}" class="btn btn-sm btn-info btn-edit-level">
                                <i class="fa fa-eye"></i>
                            </a>  
                            
                            <form action="{{ route('admin.wards.destroy', $ward) }}" method="post">
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

        <span class="font-weight-bold ml-3">No wards added yet</span>
    </div>
    @endif
</div>
@endsection

@section('scripts')
    
<script>
    
    console.log('Hello, you are in level index')
    
</script>
@endsection