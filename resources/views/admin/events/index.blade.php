@extends('layouts.admin')
@push('scripts')
    <script src="{{ asset('js/crud.js') }}?v=@php echo rand(10000, 100000) @endphp"></script>
@endpush
@section('content')
    @can('create', App\Event::class)
        <div class="row m-1">
            <div class="col-md-12">
                <a class="btn btn-primary float-right" role="button" href="{{ route('events.create') }}">Create Event</a>
            </div>
        </div>
    @endif
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Owner Name</th>
                <th scope="col">Owner Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                @can('view', $event)
                    <tr>
                        <td scope="row">{{ $events->firstItem() + $loop->index }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{{ $event->address }}</td>
                        <td>{{ $event->user->name }}</td>
                        <td>{{ $event->user->email }}</td>
                        <td>
                            @can('edit', $event)
                                <a data-id="{{ $event->id }}" data-action="edit" href="{{ route('events.edit', ['id' => $event->id]) }}"><i class="fas fa-pen"></i></a>
                            @endcan

                            @can('delete', $event)
                                <form class="d-inline" id="destroy-{{ $event->id }}" method="post" action="{{ route('events.destroy', ['id' => $event->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a data-id="{{ $event->id }}" data-action="destroy" href="#"><i class="fas fa-trash"></i></a>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endcan
            @endforeach
        </tbody>
    </table>
{{ $events->links() }}
@endsection