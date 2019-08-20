@extends('layouts.app')
@section('content')
<div class="container">
    @foreach ($events as $event)
    <dl class="row">
        <dt class="col-sm-3">Name</dt>
        <dd class="col-sm-9">{{ $event->name }}</dd>

        <dt class="col-sm-3">Organizer Name</dt>
        <dd class="col-sm-9">{{ $event->user->name }}</dd>

        <dt class="col-sm-3">Name</dt>
        <dd class="col-sm-9">{{ $event->user->email }}</dd>

        <dt class="col-sm-3">Address</dt>
        <dd class="col-sm-9">{{ $event->address }}</dd>

        <dt class="col-sm-3">Date</dt>
        <dd class="col-sm-9">{{ $event->date }}</dd>

        <dd class="col-sm-12">
            <a class="btn btn-primary float-right" href="{{ route('event.request', ['id' => $event->id]) }}">Participate</a>
        </dd>
    </dl>
    @endforeach
    {{ $events->links() }}
</div>
@endsection