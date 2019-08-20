@extends('layouts.app')
@push('scripts')
<script src="{{ asset('js/event_request.js') }}"></script>
@endpush
@section('content')
<div id="result" role="alert">
</div>
<h2>Request for participation to event {{ $event->name }} </h2>
<form id="event_request" method="post" action="{{ route('save.event.request', ['id' => $event->id]) }}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="Name" required>
    </div>
    <div class="form-group">
        <label for="surname">Surname</label>
        <input name="surname" type="text" class="form-control" id="surname" placeholder="Surname" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone" required>
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" required>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="education_level">Education level</label>
        <select name="education_level" class="form-control" id="education_level" required>
            <option value="Bachelor">Bachelor</option>
            <option value="Master">Master</option>
            <option value="Phd">Phd</option>
        </select>
    </div>
    <input type="hidden" name="utm" value="{{ Request::getQueryString() }}">
    <input type="hidden" name="event_id" value="{{ $event->id }}">
    <button id="event_request_submit" type="submit" class="btn btn-primary">
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
        <span class="label">Submit<span>
    </button>
</form>
@endsection
