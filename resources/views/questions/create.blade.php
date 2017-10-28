@extends('layouts.campus')

@section('content')
<div class="container-fluid pt-3">
    <div class="jumbotron">
      <h1 class="display-3">Crear una nueva pregunta</h1>
      <p class="lead">Crear una nueva pregunta no es tarea facil, recuerda ser muy critico y poner todo tu esfuerzo para que la comunidad pueda disfrutar de preguntas de calidad que fortalezcan sus procesos de aprendizaje.</p>
    </div>
    <form method="POST" action="{{ url('questions/create') }}">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="area_id">Name</label>
            <select class="form-control" id="area_id" name="area_id">
            	@foreach($areas as $area)
            	<option value="{{ $area->id }}">{{ $area->grade->career->name }} | {{ $area->grade->name }} | {{ $area->name }}</option>
            	@endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="ej. Colombia" value="{{ old('name') ? old('name') : $question->name }}">
        </div>
        <div class="form-group">
            <label for="picture">Picture</label>
            <input type="text" class="form-control ckfile" id="picture" name="picture" readonly placeholder="/picture/of/this/category" value="{{ old('picture') ? old('picture') : $question->picture }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" placeholder="Describe your category">{{ old('description') ? old('description') : $question->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control">{{ old('content') ? old('content') : $question->content }}</textarea>
            <script type="text/javascript">
                var editor = CKEDITOR.replace('content');
            </script>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
    </form>
</div>
@endsection
