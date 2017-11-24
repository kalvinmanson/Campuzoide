@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-4">
		@include('partials.cards.user', ['user' => $user])
        <hr>
        <div class="card card-secondary">
			<div class="card-body">
				<p class="text-muted">

				  {{ $user->country ? 'País: '.$user->country->name : '' }}
				  {{ $user->institution ? ' Institución: '.$user->institution->name : '' }}
				  {{ $user->grade ? ' Nivel: '.$user->career->name.'/'.$user->grade->name : '' }}
				  Rol: {{ $user->role }}
				  {{ $user->birthdate ? 'Fecha de nacimeinto: '.$user->birthdate : '' }}
				</p>
				<p>{{ $user->country ? $user->description : 'Cuentanos algo sobre ti.' }}</p>
					
			</div>
		</div>
	</div>
    <div class="col-md-8">

    	<ul class="nav nav-tabs" id="userOptions" role="tablist">
		  <li class="nav-item">
		    <a class="nav-link active" id="results-tab" data-toggle="tab" href="#results" role="tab" aria-controls="results" aria-selected="true">Resultados</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="questions-tab" data-toggle="tab" href="#questions" role="tab" aria-controls="questions" aria-selected="false">Preguntas creadas</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" id="medals-tab" data-toggle="tab" href="#medals" role="tab" aria-controls="medals" aria-selected="false">Medallas</a>
		  </li>
		  @if(Auth::check() && Auth::user()->id == $user->id)
		  <li class="nav-item">
		    <a class="nav-link" id="medals-tab" data-toggle="tab" href="#editProfile" role="tab" aria-controls="editProfile" aria-selected="false">Editar Perfil</a>
		  </li>
		  @endif
		</ul>
		<div class="tab-content" id="userOptionsContent">
		  <div class="tab-pane fade show active" id="results" role="tabpanel" aria-labelledby="results-tab">
		  	{{-- Resultados --}}
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
		  	{{-- Resultados --}}
		  </div>
		  <div class="tab-pane fade" id="questions" role="tabpanel" aria-labelledby="questions-tab">
		  	@foreach($user->questions->where('active', true) as $question)
	            @include('partials.cards.question', ['question' => $question])
	        @endforeach
		  </div>
		  <div class="tab-pane fade" id="medals" role="tabpanel" aria-labelledby="medals-tab">
		  	<p class="text-muted text-center">El usuario aún no ha ganado ninguna medalla.</p>
		  </div>

		  @if(Auth::check() && Auth::user()->id == $user->id)
		  <div class="tab-pane fade" id="editProfile" role="tabpanel" aria-labelledby="editProfile-tab">
		  	{{-- Editar Perfil --}}
		  	<div class="card">
		  	<form method="POST" action="{{ url('users/' . $user->id) }}" class="card-body">
		    	<input type="hidden" name="_method" value="PUT">
		    	{{ csrf_field() }}
		        <div class="form-group">
				    <label for="country_id">País</label>
				    <select name="country_id" id="country_id" class="form-control">
		                @foreach($countries as $country)
		                <option value="{{ $country->id }}" {{ $country->id == $user->country_id ? 'selected' : '' }}>{{ $country->name }}</option>
		                @endforeach
		            </select>
				</div>
				<div class="form-group">
				    <label for="institution_id">Institución</label>
				    <select name="institution_id" id="institution_id" class="form-control">
		                @foreach($institutions as $institution)
		                <option value="{{ $institution->id }}" {{ $institution->id == $user->institution_id ? 'selected' : '' }} data-country_id="{{ $institution->country_id }}">{{ $institution->name }}</option>
		                @endforeach
		            </select>
				</div>
				<div class="form-group">
				    <label for="grade_id">Nivel académico</label>
				    <select name="grade_id" id="grade_id" class="form-control">
		                @foreach($grades as $grade)
		                <option value="{{ $grade->id }}" {{ $grade->id == $user->grade_id ? 'selected' : '' }}>{{ $grade->career->name }} | {{ $grade->name }}</option>
		                @endforeach
		            </select>
		            <small class="form-text text-danger">
		            	Si cambias tu grado a un nivel inferior al actual tu ranking será reiniciado.
		            </small>
				</div>
				<div class="form-group">
		            <label for="name">Nombre (Se muestra público)</label>
		            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ? old('name') : $user->name }}">
		        </div>
		        <div class="form-group">
		            <label for="description">Bio</label>
		            <textarea class="form-control" id="description" name="description">{{ old('description') ? old('description') : $user->description }}</textarea>
		        </div>
		        <div class="form-group">
				    <label for="gender">Género</label>
				    <select name="gender" id="gender" class="form-control">
		                <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Masculino</option>
		                <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Femenino</option>
		            </select>
				</div>
		        <div class="form-group">
		            <label for="phone">Teléfono</label>
		            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') ? old('phone') : $user->phone }}">
		        </div>
		        <div class="form-group">
		            <label for="address">Dirección</label>
		            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') ? old('address') : $user->address }}">
		        </div>
		        <div class="form-group">
		            <label for="birthdate">Fecha de nacimiento</label>
		            <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate') ? old('birthdate') : $user->birthdate }}">
		        </div>
		        <div class="form-check">
				    <label class="form-check-label">
				      <input type="checkbox" name="subscribed" class="form-check-input" {{ $user->suscribe == true ? 'checked' : ''}}>
				      Deseo recibir novedades por correo.
				    </label>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Guardar Cambios</button>
				</div>

		    </form>
			</div>
		  	{{-- Editar Perfil --}}
		  </div>
		  @endif
		</div>		
    </div>
</div>
@endsection
