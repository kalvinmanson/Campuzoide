@extends('layouts.admin')

@section('content')
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addNew">
  <i class="fa fa-plus"></i> Add New
</button>
    <h1>Institutions</h1>
    <table class="table table-striped dataTable">
        <thead class="thead-inverse">
            <tr>
                <th width="10">#</th>
                <th>Institution</th>
                <th>Name</th>
                <th width="250">Created</th>
                <th width="250">Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($institutions as $institution)
            <tr>
                <td>{{ $institution->id }}</td>
                <td>{{ $institution->country->name }}</td>
                <td>
                    <a href="/admin/institutions/{{ $institution->id }}/edit">{{ $institution->name }}</a>
                </td>
                <td>{{ $institution->created_at }}</td>
                <td>{{ $institution->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

<!-- Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" action="{{ url('admin/institutions') }}">
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
                <label for="country_id">Country</label>
                <select name="country_id" id="country_id" class="form-control">
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
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