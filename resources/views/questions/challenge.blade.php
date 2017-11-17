@extends('layouts.app')

@section('content')

<div class="jumbotron">
  <div class="row">
    <div class="col-sm-7 col-lg-6">
        <h1>{{ $question->name }}</h1>
        @if($question->picture)
            <div class="w-25 float-right ml-2 mb-2">
                <a href="{{ $question->picture }}" title="{{ $question->name }}" data-fancybox data-caption="{{ $question->name }}">
                    <img src="{{ $question->picture }}" alt="{{ $question->name }}" class="img-fluid">
                </a>
            </div>
        @endif
        {!! $question->content !!}
    </div>
    <div class="col-sm-5 col-lg-3">
        <div id="result">
            <div class="time" id="timer">{{ $question->time }}</div>
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
    <div class="col-sm-12 col-lg-3">
        <div class="row">
            <div class="col-sm-6 col-lg-12">
                @include('partials.cards.user', ['user' => $question->user])
            </div>
            <div class="col-sm-6 col-lg-12">
                @include('partials.cards.question', ['question' => $question])
            </div>
        </div>
    </div>
  </div> 
</div>
@endsection
