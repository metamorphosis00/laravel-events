@extends('layouts.admin')
@section('content')
<form method="post" action="{{ route('events.update', ['id' => $event->id ]) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Enter name" value="{{ $event->name }}">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input name="address" type="text" value="{{ $event->address }}" class="form-control" id="address" placeholder="Enter address">
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input name="date" type="datetime" value="{{ $event->date }}" class="form-control" id="date" placeholder="Enter date">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection