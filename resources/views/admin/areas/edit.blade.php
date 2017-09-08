@extends('layouts.admin')

@section('content')
    <h1>Areas: Edit {{ $area->name }}</h1>
    <form method="POST" action="{{ url('admin/areas/' . $area->id) }}">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="grade_id">Grade</label>
            <select name="grade_id" id="grade_id" class="form-control">
                @foreach($grades as $grade)
                <option value="{{ $grade->id }}" {{ $grade->id == $area->grade_id ? 'selected' : '' }}>{{ $grade->career->name }} | {{ $grade->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="ej. Colombia" value="{{ old('name') ? old('name') : $area->name }}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        </div>
    </form>
@endsection