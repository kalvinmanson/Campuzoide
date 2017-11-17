@extends('layouts.app')

@section('content')

<div class="jumbotron">
  <h1>{{ $question->name }}</h1>
  <div class="row">
    <div class="col-sm-7 col-lg-6">
        @if($question->picture)
            <img src="{{ $question->picture }}" class="img-fluid"> 
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
