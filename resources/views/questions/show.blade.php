@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-7 col-lg-8">
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
    <div class="col-sm-12 col-lg-4">
        <div class="row">
            <div class="col-sm-6 col-lg-12">
                @include('partials.cards.user', ['user' => $question->user])
            </div>
            <div class="col-sm-6 col-lg-12">
                @include('partials.cards.question', ['question' => $question])
            </div>
        </div>
        @include('partials.comment', ['type' => 'question', 'comments' => $question->comments])
    </div>
</div>
@endsection
