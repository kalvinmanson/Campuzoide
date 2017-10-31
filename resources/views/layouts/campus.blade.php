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
<body class="pt-5">
@include('partials.header')

    <div class="campus">
        <div class="sidebar">

            <div class="card text-white bg-primary">
              <div class="card-header">Hola, {{ Auth::user()->name }}</div>
              <div class="card-body">
                <div class="row">
                    <div class="col-2 p-0">
                        <img src="{{ Auth::user()->picture ? Auth::user()->picture : "/img/user.png" }}" class="img-fluid">
                    </div>
                    <div class="col-10">
                        <h2>Ranking: {{ Auth::user()->rank }}</h2>
                        <small>Realiza desafios de preguntas, gana medallas y mejora tu ranking.</small>
                    </div>
                </div>
              </div>
            </div>
            <div class="list-group">
              <span class="list-group-item active"><strong>Desafío de preguntas</strong></span>
              <a href="/questions" class="list-group-item list-group-item-action">Iniciar un desafio</a>
              <a href="#" class="list-group-item list-group-item-action">Resultados</a>
              <a href="#" class="list-group-item list-group-item-action">Examenes</a>
              <a href="/questions/cooperate" class="list-group-item list-group-item-action">Colaborar</a>
            </div>
            <div class="list-group">
              <span class="list-group-item active"><strong>Aulas virtuales</strong></span>
              <a href="#" class="list-group-item list-group-item-action">Matemáticas 9°</a>
            </div>
        </div>
        <div class="content">
            <div class="inner">
                <div class="container">
                    @include('flash::message')
                    @include('partials.errors')
                </div>
                @yield('content')
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
    <script src="/js/app.js"></script>
</body>
</html>
