@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">Iniciar session</div>
                <div class="card-body">
                    <p class="text-center">
                        <a href="/login/google" class="btn btn-lg btn-danger animated pulse infinite"><i class="fa fa-google"></i> Inicia sesión con Google</a>
                    </p>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                              @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                              <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                          </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme en este equipo
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Entrar
                                </button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    ¿Olvidaste tu password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
