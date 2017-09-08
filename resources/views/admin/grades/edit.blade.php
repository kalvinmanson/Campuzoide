@extends('layouts.admin')

@section('content')
    <h1>Grades: Edit {{ $grade->name }}</h1>
    <form method="POST" action="{{ url('admin/grades/' . $grade->id) }}">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="career_id">Country</label>
            <select name="career_id" id="career_id" class="form-control">
                @foreach($careers as $career)
                <option value="{{ $career->id }}" {{ $career->id == $grade->career_id ? 'selected' : '' }}>{{ $career->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="ej. Colombia" value="{{ old('name') ? old('name') : $grade->name }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
    </form>
@endsection