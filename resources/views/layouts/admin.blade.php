<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    @stack('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">
</head>
<body>
<div id="app" class="container-fluid">
    <div class="row min-vh-100">
        <aside class="col-12 col-md-2 p-0 bg-dark">
            <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2">
                <div class="collapse navbar-collapse">
                    <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                            @component('admin.sidebar.link', ['route' => route('admin.index'), 'role' => 'admin|organizer'])
                                Overview
                            @endcomponent

                            @component('admin.sidebar.link', ['route' => route('users.index'), 'role' => 'admin'])
                                Users
                            @endcomponent

                            @component('admin.sidebar.link', ['route' => route('events.index'), 'role' => 'admin|organizer'])
                                Events
                            @endcomponent

                            @component('admin.sidebar.link', ['route' => route('admin.content'), 'role' => 'admin'])
                                Main Page Content
                            @endcomponent
                    </ul>
                </div>
            </nav>
        </aside>
        <main class="col bg-faded py-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</div>
</body>
</html>
