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
            <div class="time">{{ $question->time }}</div>
        </div>

        {{ csrf_field() }}
        <input type="hidden" name="question_id" value="{{ $question->id }}">
        <input type="hidden" name="url" value="{{ $url }}">
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
                <a href="/users/{{ $question->user->username }}" class="user">
                    <img src="{{ $question->user->picture or '/img/user.png' }}" class="avatar">
                    <h2>{{ $question->user->name }}</h2>
                </a>
            </div>
            <div class="col-sm-6 col-lg-12">
                <div class="code">
                    {{ $question->code }}
                </div>
                <div class="rank">
                    <h2>Rank: {{ $question->rank }}%</h2>
                    <span class="badge bg-success">
                        {{ $question->answers->where('result', 1)->count() }} <i class="fa fa-check"></i>
                    </span>
                    <span class="badge bg-danger">
                        {{ $question->answers->where('result', 0)->count() }} <i class="fa fa-remove"></i>
                    </span>
                </div>
                @include('partials.comment')
            </div>
        </div>
    </div>
  </div> 
</div>
@endsection
