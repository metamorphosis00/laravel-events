@if (Auth::user()->hasRole($role))
<li class="nav-item">
    <a class="nav-link pl-0 text-nowrap" href="{{ $route }}">
        @if (Request::url() == $route)
            <i class="fa fa-bullseye fa-fw"></i> <span class="font-weight-bold">{{ $slot }}</span>
        @else
            <i class="fa fa-heart-o fa-fw"></i> <span class="d-none d-md-inline">{{ $slot }}</span>
        @endif
    </a>
</li>
@endif