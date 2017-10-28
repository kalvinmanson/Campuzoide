@extends('layouts.campus')

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
  					<tr>
  						<th>Pregunta</th>
  						<th></th>
  					</tr>
  					@foreach($myQuestions as $question)
  					<tr>
  						<td>{{ $question->name }}</td>
  						<td></td>
  					</tr>
  					@endforeach
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
