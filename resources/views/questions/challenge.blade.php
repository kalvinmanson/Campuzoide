@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="question">
            <h1 class="title">{{ $question->name }}</h1>
            <div class="info">
                <button type="button" id="vote" class="btn {{ ($question->votes->where('user_id', Auth::user()->id)->count() > 0) ? 'btn-danger' : 'btn-secondary' }} float-right" data-csrf="{{ csrf_token() }}" data-type="question" data-id="{{ $question->id }}">
                    <i class="fa fa-heart-o"></i>
                    <span id="voteResult">{{ $question->votes->count() }}</span>
                </button>
                <p class="text-muted">
                    <small>
                    Autor: {{ $question->user->name }}<br>
                    Nivel: {{ $question->area->grade->career->name }}, {{ $question->area->grade->name }}, {{ $question->area->name }}<br>
                    </small>
                </p>
                <div class="clearfix"></div>
            </div>
            @if($question->picture)
                <div class="w-25 float-right ml-2 mb-2">
                    <a href="{{ $question->picture }}" title="{{ $question->name }}" data-fancybox data-caption="{{ $question->name }}">
                        <img src="{{ $question->picture }}" alt="{{ $question->name }}" class="img-thumbnail img-fluid">
                    </a>
                </div>
            @endif
            {!! $question->content !!}
        </div>
        <div class="clearfix"></div>
        <div id="result">
            @if($question->time > 0)
            <div class="row">
                <div class="time col-sm-4 bg-dark text-white p-2 text-center m-auto" style="font-size: 3em;" id="timer">{{ $question->time }}</div>
            </div>
            @endif
        </div>

        {{ csrf_field() }}
        <input type="hidden" name="question_id" value="{{ $question->id }}">
        <input type="hidden" name="url" value="{{ $url }}">
        <input type="hidden" name="timePlayer" value="0">
        <ul class="answers">
            <li class="answer" data-result="1">{{ $question->option_a }}</li>
            <li class="answer" data-result="2">{{ $question->option_b }}</li>
            <li class="answer" data-result="3">{{ $question->option_c }}</li>
            <li class="answer" data-result="4">{{ $question->option_d }}</li>
        </ul>
    </div>
    <div class="col-md-4">
        @include('partials.cards.user', ['user' => $question->user])
        @include('partials.cards.question', ['question' => $question])
        @include('partials.cards.lastAnswers', ['question' => $question])

    </div>
</div> 
@endsection
