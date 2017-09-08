@extends('layouts.admin')

@section('content')
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addNew">
  <i class="fa fa-plus"></i> Add New
</button>
<h1>Blocks</h1>
<table class="table table-striped dataTable">
    <thead class="thead-inverse">
        <tr>
            <th width="10">#</th>
            <th>Name</th>
            <th>Picture</th>
            <th>Description</th>
            <th width="250">Timestamps</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blocks as $block)
        <tr>
            <td>{{ $block->id }}</td>
            <td>
                <a href="/admin/blocks/{{ $block->id }}/edit">{{ $block->name }}</a>
            </td>
            <td><a href="{{ $block->picture }}" data-fancybox data-caption="{{ $block->name }}">{{ $block->picture }}</a></td>
            <td>{{ $block->description }}</td>
            <td>
                <small>
                    Created at: {{ Carbon::createFromFormat('Y-m-d H:i:s', $block->created_at)->format('jS F Y g:ia') }}<br />
                    Updated at: {{ Carbon::createFromFormat('Y-m-d H:i:s', $block->updated_at)->format('jS F Y g:ia') }}<br />
                    ({{ Carbon::createFromFormat('Y-m-d H:i:s', $block->updated_at)->diffForHumans() }})
                </small>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>




<!-- Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" action="{{ url('admin/blocks') }}">
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
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
            </div>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <label for="format">Format</label>
                <input type="text" name="format" id="format" class="form-control" value="Simple" required>
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