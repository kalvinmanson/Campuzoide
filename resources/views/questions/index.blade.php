@extends('layouts.app')

@section('content')

<div class="jumbotron">
  <h1>Desafío de preguntas</h1>
  <p class="lead">En un desafio te enfrentas a muchas preguntas de diferentes temas que tu elijas, la dificultad de la pregunta se elevara tras cada acierto y se reducira tras cada fallo.</p>
  <hr class="my-4">
  <p>Selecciona los filtros para tu desafío.</p>
  <p>Puedes hacer tu desafío solo por un área en particular (ej. Lenguaje) o seleccionar el grado y enfrentarte a todas las áreas de ese grado.</p>
</div>
{{-- Area Selector --}}
<div class="row">
	@foreach($careers as $career)
	<div class="col-sm-4">
		<div class="card bg-light mb-3">
	  <div class="card-header">
	  	<a href="/questions/challenge?career_id={{ $career->id }}" class="badge badge-secondary float-right">Todas</a>
	  	{{ $career->name }}
	  </div>
	  <div class="card-body p-0">
	    <ul class="nav flex-column">
	    @foreach($career->grades as $grade)
	    	<li class="nav-item">
	    		<a href="/questions/challenge?grade_id={{ $grade->id}}" class="nav-link bg-secondary text-white">
	    			{{ $grade->name}}
	    		</a>
	    		<ul class="nav flex-column">
	    		@foreach($grade->areas as $area)
			    	<li class="nav-item">
			    		<a href="/questions/challenge?area_id={{ $area->id}}" class="nav-link">{{ $area->name}}</a>
			    	</li>
			    @endforeach
			    </ul>
			    </li>
			</li>
	    @endforeach
	    </ul>
	  </div>
	</div>
	</div>
	@endforeach
</div>
@endsection
