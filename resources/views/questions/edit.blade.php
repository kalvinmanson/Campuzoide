@extends('layouts.app')

@section('content')
<div class="jumbotron">
  <h1 class="display-3">Crear una nueva pregunta</h1>
  <p class="lead">Crear una nueva pregunta no es tarea facil, recuerda ser muy critico y poner todo tu esfuerzo para que la comunidad pueda disfrutar de preguntas de calidad que fortalezcan sus procesos de aprendizaje.</p>
</div>
<form method="POST" action="{{ url('questions/' . $question->id) }}">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="area_id">Grado y Área a la que pertenece la pregunta</label>
        <select class="form-control" id="area_id" name="area_id">
        	@foreach($areas as $area)
        	<option value="{{ $area->id }}" {{ $question->area_id == $area->id ? 'selected' : '' }}>
                {{ $area->grade->career->name }} | {{ $area->grade->name }} | {{ $area->name }}
            </option>
        	@endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="name">Titulo para la pregunta</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="¿Qué pasaría en la naturaleza si faltaran los descomponedores dentro de este ciclo?" value="{{ old('name') ? old('name') : $question->name }}">
    </div>
    <div class="form-group">
        <label for="picture">Imagen de apoyo</label>
        <input type="text" class="form-control ckfile" id="picture" name="picture" readonly placeholder="/picture/of/this/category" value="{{ old('picture') ? old('picture') : $question->picture }}">
    </div>
    <div class="form-group">
        <label for="content">Descripción completa de la pregunta</label>
        <textarea name="content" id="content" class="form-control">{{ old('content') ? old('content') : $question->content }}</textarea>
        <script type="text/javascript">
            var editor = CKEDITOR.replace('content',{
                customConfig: '/editor/mini.js'
            });
        </script>
    </div>
    <h3>Opciones</h3>
    <p>Escribe las respuestas cada una en su campo correspondiente y <strong>marca la respuesta correcta</strong>, ten en cuenta que las respuestas se van a barajar cuando se mestren a los usuarios por lo cual no debes referenciarlas directamente desde la descripción de la pregunta.</p>
    <div class="row">
        <div class="col-sm-6">
            <label for="option_a">Opcion A</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="radio" name="correct" value="1" {{ $question->correct == 1 ? 'checked' : '' }} required>
                </span>
                <input type="text" class="form-control" id="option_a" name="option_a" placeholder="Las plantas aumentarían la absorción del nitrógeno." value="{{ old('option_a') ? old('option_a') : $question->option_a }}" required>
            </div>
        </div>
        <div class="col-sm-6">
            <label for="option_b">Opcion B</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="radio" name="correct" value="2" {{ $question->correct == 2 ? 'checked' : '' }} required>
                </span>
                <input type="text" class="form-control" id="option_b" name="option_b" placeholder="Las plantas tendrían menos nutrientes para crecer" value="{{ old('option_b') ? old('option_b') : $question->option_b }}" required>
            </div>
        </div>
        <div class="col-sm-6">
            <label for="option_c">Opcion C</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="radio" name="correct" value="3" {{ $question->correct == 3 ? 'checked' : '' }} required>
                </span>
                <input type="text" class="form-control" id="option_c" name="option_c" placeholder="Las proteínas no tendrían nitrógeno." value="{{ old('option_c') ? old('option_c') : $question->option_c }}" required>
            </div>
        </div>
        <div class="col-sm-6">
            <label for="option_d">Opcion D</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="radio" name="correct" value="4" {{ $question->correct == 4 ? 'checked' : '' }} required>
                </span>
                <input type="text" class="form-control" id="option_d" name="option_d" placeholder="Los seres vivos ya no necesitarían el nitrógeno." value="{{ old('option_d') ? old('option_d') : $question->option_d }}" required>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="time">Tiempo para responder (minutos)</label>
                <input type="number" class="form-control" id="time" name="time" placeholder="0 significa que no corre el tiempo." value="{{ old('time') ? old('time') : $question->time }}">
            </div>
        </div>
        <div class="col-sm-8">
            <div class="form-group">
                <label for="tags">Palabras clave</label>
                <input type="text" class="form-control tagsInput" id="tags" name="tags" placeholder="Palabras clave separadas por comas." value="{{ old('tags') ? old('tags') : $question->tags }}">
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Editar Pregunta</button>
    </div>
</form>
@endsection
