<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Campuzoide') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- editor -->
    <script src="{{ asset('editor/ckeditor.js') }}"></script>
</head>
<body class="pt-5">
@include('partials.header')
    <div class="campus">
        @include('partials.user')
        <div class="content">
            <div class="inner pt-4">
                <div class="container">
                    @include('flash::message')
                    @include('partials.errors')
                </div>
                <div class="{{ Auth::check() ? 'container-fluid' : 'container'}}">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.dataTables.min.js"></script>
    <script src="/js/dataTables.bootstrap4.min.js"></script>
    <script src="/js/jquery.fancybox.min.js"></script>
    <script src="/js/tagsinput.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>
