@extends('layouts.admin')
@section('content')
<form method="post" action="{{ route('events.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Event Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Enter event name">
    </div>
    <div class="form-group">
        <label for="organizer-email">Organizer Email</label>
        <input name="organizer-email" type="email" class="form-control" id="organizer-email" placeholder="Enter organizer email">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <input name="address" type="text" class="form-control" id="address" placeholder="Enter event address">
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input name="date" type="datetime" class="form-control" id="date" placeholder="Enter date and time(YYYY-m-d h:i:s)">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection