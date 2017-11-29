@extends('layouts.app')

@section('content')
@include('partials.aula.header', ['area' => $area])
<div class="row">
	@foreach($area->contents as $content)
	<div class="col-sm-7">
		<div class="card">
		  <img class="card-img-top" src="{{ $content->picture }}" alt="{{ $content->name }}">
		  <div class="card-body">
		    <h4 class="card-title">{{ $content->name }}</h4>
		    <p class="card-text">{{ $content->description }}</p>
		    <a href="/aula/{{ $area->id }}/content/{{ $content->id }}" class="btn btn-primary">Ver más</a>
		  </div>
		</div>
	</div>
	@endforeach
</div>
@endsection
