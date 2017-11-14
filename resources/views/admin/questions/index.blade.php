@extends('layouts.admin')

@section('content')
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addNew">
  <i class="fa fa-plus"></i> Add New
</button>
    <h1>Questions</h1>
    <table class="table table-striped dataTable">
        <thead class="thead-inverse">
            <tr>
                <th width="10">#</th>
                <th width="250">User</th>
                <th>Name</th>
                <th width="250">Created</th>
                <th width="250">Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($questions as $question)
            <tr class="{{ $question->active ? '' : 'table-warning' }}">
                <td>{{ $question->id }}</td>
                <td>
                  <a href="/users/{{ $question->user->username }}" target="_blank">{{ $question->user->name }}</a><br>
                  <small>{{ $question->user->email }} ({{ $question->user->role }})</small>
                </td>
                <td>
                    <a href="/admin/questions/{{ $question->id }}/edit">{{ $question->name }}</a><br>
                    {{ $question->career->name }} / {{ $question->grade->name }} / {{ $question->area->name }}<br>
                    <small>
                      Rank: {{ $question->rank }}% |
                      Level: {{ $question->level }} |
                      Wins: {{ $question->answers->where('result', true)->count() }}
                      Fails: {{ $question->answers->where('result', false)->count() }}
                    </small>
                </td>
                <td>{{ $question->created_at }}</td>
                <td>{{ $question->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection