@extends('layouts.admin')
@section('content')
<form method="post" action="{{ route('users.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input name="password" type="password" class="form-control" id="password" placeholder="Enter password">
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select name="role_id" class="form-control" id="role">
            @foreach ($roles as $role)
            <option value="{{ $role->id }}">
            {{ $role->role }}
            </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection