@extends('layouts.admin')
@section('content')
<form method="post" action="{{ route('users.update', ['id' => $user->id ]) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Enter name" value="{{ $user->name }}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" type="email" value="{{ $user->email }}" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select name="role_id" class="form-control" id="role">
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" @php echo ($role->id == $user->role_id) ? 'selected' : '' @endphp>
                    {{ $role->role }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection