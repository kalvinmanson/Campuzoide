@extends('layouts.app')

@section('content')
<div class="container-fluid pt-3">
    <div class="jumbotron">
      <h1 class="display-3">Colaborar</h1>
      <p class="lead">Hay muchas formas de colaborar con la plataforma Campuzoide, pero la mas valiosa es publicando tus propias preguntas para que otros usuarios se enfrenten a ellas.</p>
      <hr class="m-4">
      <p>En esta seccion encontraras las preguntas que has calificado, reportado y por supuesto las preguntas que has creado, en estas últimas podras consultar su ranking en funcion de cuantas respuestas correctas e incorrectas se han producido.</p>

    </div>
    <div class="row">
  	  <div class="col-sm-8">
  		<div class="card">
  			<div class="card-header">
  				<a href="/questions/create" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Agregar</a>
  				<h5>Mis preguntas</h5>
  			</div>
  			<div class="card-body p-0">
  				<table class="table table-striped">
            <thead>
    					<tr>
                <th width="100"></th>
    						<th>Pregunta</th>
    						<th></th>
    					</tr>
            </thead>
            <tbody>
  					@foreach($myQuestions as $question)
  					<tr class="{{ $question->active ? '' : 'table-warning' }}">
              <td>
                <h1><span class="badge badge-primary">{{ $question->rank }}%</span></h1>
              </td>
  						<td>
                <small>{{ $question->career->name }} / {{ $question->grade->name }} / {{ $question->area->name }}</small><br>
                <a href="/questions/{{ $question->code }}"><strong>{{ $question->name }}</strong></a><br>
                <span class="badge bg-success">
                    {{ $question->answers->where('result', 1)->count() }} <i class="fa fa-check"></i>
                </span>
                <span class="badge bg-danger">
                    {{ $question->answers->where('result', 0)->count() }} <i class="fa fa-remove"></i>
                </span>
              </td>
  						<td><a href="/questions/{{ $question->id }}/edit"><i class="fa fa-edit"></i></a></td>
  					</tr>
  					@endforeach
            </tbody>
  				</table>
  			</div>
  		</div>
  	  </div>
  	  <div class="col-sm-4">
  	  	<div class="card">
  			<div class="card-header"><h5>Preguntas valoradas</h5></div>
  			<div class="card-body"></div>
  		</div>
  		<div class="card">
  			<div class="card-header"><h5>Preguntas reportadas</h5></div>
  			<div class="card-body"></div>
  		</div>
  	  </div>
    </div>
</div>
@endsection
