@extends('layouts.admin')

@section('content')
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addNew">
  <i class="fa fa-plus"></i> Add New
</button>
    <h1>Areas</h1>
    <table class="table table-striped dataTable">
        <thead class="thead-inverse">
            <tr>
                <th width="10">#</th>
                <th>Career</th>
                <th>Grade</th>
                <th>Name</th>
                <th width="250">Created</th>
                <th width="250">Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($areas as $area)
            <tr>
                <td>{{ $area->id }}</td>
                <td>{{ $area->grade->career->name }}</td>
                <td>{{ $area->grade->name }}</td>
                <td>
                    <a href="/admin/areas/{{ $area->id }}/edit">{{ $area->name }}</a>
                </td>
                <td>{{ $area->created_at }}</td>
                <td>{{ $area->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

<!-- Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" action="{{ url('admin/areas') }}">
    {{ csrf_field() }}
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="grade_id">Career</label>
                <select name="grade_id" id="grade_id" class="form-control">
                    @foreach($grades as $grade)
                    <option value="{{ $grade->id }}">{{ $grade->career->name }} | {{ $grade->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
          </div>
        </div>
    </form>
  </div>
</div>
@endsection