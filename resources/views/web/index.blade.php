@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="card bg-primary text-white border-0">
          <img class="card-img" src="/img/clips/home01.jpg" alt="Bienvenido a Campuzoide">
          <div class="card-body">
            <p class="card-text">Campuzoide es una plataforma de entrenamiento en pruebas SABER (3°, 5°, 9° y 11°) en la que podrás encontrar diferentes preguntas correspondiente a las áreas que se trabajan en estas pruebas. Enfréntate a los desafíos de preguntas, gana medallas, mejora tu ranking y demuestra que eres el mejor.</p>
          </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Y3BrvU2Vn04?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
        </div>

        @if(!Auth::check())
            <p class="text-center p-2">
                <a href="/login/google" class="btn btn-lg btn-danger animated pulse infinite"><i class="fa fa-google"></i> Inicia sesión con Google</a>
            </p>
        @endif
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-8">
        <p class="text-muted">Ssabemos que aún falta mucho, trabajamos en ello.</p>
    </div>
    <div class="col-sm-4">
        @foreach($lastQuestions as $question)
            @include('partials.cards.question', ['question' => $question])
        @endforeach
    </div>
</div>
@endsection
