@extends('layouts.admin')

@section('content')
    <h1>Countries: Edit {{ $country->name }}</h1>
    <form method="POST" action="{{ url('admin/countries/' . $country->id) }}">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="ej. Colombia" value="{{ old('name') ? old('name') : $country->name }}">
                </div>
                <div class="form-group">
                    <label for="code">Code</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="ej. Colombia" value="{{ old('code') ? old('code') : $country->code }}">
                </div>
                <div class="form-group">
                    <label for="domain">Domain</label>
                    <input type="text" class="form-control" id="domain" name="domain" placeholder="ej. Colombia" value="{{ old('domain') ? old('domain') : $country->domain }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="configs">Configs</label>
                    <table id="tableTarget" class="table table-striped">
                        @foreach(json_decode($country->configs) as $key => $config)
                            <tr>
                                <td>{{ $key }}</td>
                                <td><input type="text" name="config[{{ $key }}]" value="{{ $config }}" class="form-control"></td>
                            </tr>
                        @endforeach
                            <tr>
                                <td><input type="text" id="new_config" class="form-control"></td>
                                <td><button type="button" class="btn btn-default tr_addField"><i class="fa fa-plus"></i> Add field</button></td>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </form>
@endsection