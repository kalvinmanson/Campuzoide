@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-7 col-lg-8">
        <div class="question">
            <h1 class="title">{{ $question->name }}</h1>
            <div class="info">
            @if(Auth::check())
                <button type="button" id="vote" class="btn {{ ($question->votes->where('user_id', Auth::user()->id)->count() > 0) ? 'btn-danger' : 'btn-secondary' }} float-right" data-csrf="{{ csrf_token() }}" data-type="question" data-id="{{ $question->id }}">
                    <i class="fa fa-heart-o"></i>
                    <span id="voteResult">{{ $question->votes->count() }}</span>
                </button>
            @endif
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
            <div class="clearfix"></div>
        </div>
        @include('partials.comment', ['type' => 'question', 'comments' => $question->comments])
    </div>
    <div class="col-sm-12 col-lg-4">
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
@endsection
