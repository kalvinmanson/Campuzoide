@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-4">
		@include('partials.cards.user', ['user' => $user])
        <hr>
	</div>
    <div class="col-md-4">
		<ul class="list-group">
		  <li class="list-group-item bg-dark text-white">Desafios recientes</li>
		  @foreach($user->answers->take(10)->sortByDesc('created_at') as $answer)
		  	<li class="list-group-item">
		  		<span class="badge badge-primary p-2 float-right">{{ $answer->question->rank }}%</span>
		  		<a href="/questions/{{ $answer->question->code }}">{{ $answer->question->name }}</a><br>
		  		<small class="text-muted">
		  			{{ $answer->question->career->name }} / {{ $answer->question->grade->name }} / {{ $answer->question->area->name }} |
		  			<i class="fa fa-clock-o"></i> {{ $answer->time }}s
		  		</small>
		  		@if($answer->result == 1)
		  			<i class="fa fa-check text-success"></i>
		  		@else
		  			<i class="fa fa-remove text-danger"></i>
		  		@endif
		  	</li>
		  @endforeach
		</ul> 
    </div>
    <div class="col-md-4">
        @foreach($user->questions->where('active', true) as $question)
            @include('partials.cards.question', ['question' => $question])
        @endforeach
    </div>
</div>
@endsection
