@extends('layouts.admin')
@push('scripts')
    <script src="{{ asset('js/crud.js') }}?v=@php echo rand(10000, 100000) @endphp"></script>
@endpush
@section('content')
    <div class="row m-1">
        <div class="col-md-12">
            <a class="btn btn-primary float-right" role="button" href="{{ route('users.create') }}">Create User</a>
        </div>
    </div>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td scope="row">{{ $users->firstItem() + $loop->index }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role->role }}</td>
                    <td>
                        <a data-id="{{ $user->id }}" data-action="edit" href="{{ route('users.edit', ['id' => $user->id]) }}"><i class="fas fa-pen"></i></a>
                        <form class="d-inline" id="destroy-{{ $user->id }}" method="post" action="{{ route('users.destroy', ['id' => $user->id]) }}">
                            @csrf
                            @method('DELETE')
                            <a data-id="{{ $user->id }}" data-action="destroy" href="#"><i class="fas fa-trash"></i></a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
{{ $users->links() }}
@endsection