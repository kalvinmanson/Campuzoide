@extends('layouts.app')

@section('content')


<h1>{{ $question->name }}</h1>
<div class="row">
    <div class="col-sm-7 col-lg-8">
        @if($question->picture)
        <img src="{{ $question->picture }}" class="img-fluid"> 
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
