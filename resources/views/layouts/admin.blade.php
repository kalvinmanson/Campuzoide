<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- editor -->
    <script src="{{ asset('editor/ckeditor.js') }}"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }} </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/pages">Pages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/blocks">Blocks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/countries">Countries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/users">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/contacts">Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/careers">Careers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/grades">Grades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/areas">Areas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/questions">Questions</a>
                </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item">
                    <a href="/admin/users/{{ Auth::user()->id }}/edit" class="nav-link">{{ Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        @include('flash::message')
        @include('partials.errors')
    </div>
    <div class="container-fluid">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.bootstrap4.min.js"></script>
    <script src="/js/jquery.fancybox.min.js"></script>    
    <script src="/js/app.js"></script>
</body>
</html>
