@extends('layouts.admin')

@section('content')
    <h1>Careers: Edit {{ $career->name }}</h1>
    <form method="POST" action="{{ url('admin/careers/' . $career->id) }}">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="ej. Colombia" value="{{ old('name') ? old('name') : $career->name }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
    </form>
@endsection