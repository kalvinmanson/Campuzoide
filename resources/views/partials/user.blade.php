@if(Auth::check())
<div class="sidebar">
  <div class="collapse navbar-collapse d-sm-block" id="sideBar">
    @include('partials.cards.user', ['user' => Auth::user()])
    <div class="list-group">
      <span class="list-group-item active"><strong>Desafío de preguntas</strong></span>
      <a href="/questions" class="list-group-item list-group-item-action">
        Iniciar un desafio 
        <span class="d-block float-right text-primary animated tada infinite">
          <i class="fa fa-gamepad"></i>
        </span>
      </a>
      <a href="#" class="list-group-item list-group-item-action">Resultados</a>
      <a href="/questions/cooperate" class="list-group-item list-group-item-action">Colaborar</a>
    </div>
    <div class="list-group">
      <span class="list-group-item active">
        <strong>Aulas: {{ Auth::user()->grade ? Auth::user()->grade->name : '' }}</strong>
        @if(Auth::user()->grade)
          <br><small>{{ Auth::user()->grade->career->name }}</small>
        @endif
    </span>
    @if(Auth::user()->grade)
      @foreach(Auth::user()->grade->areas as $area)
        <a href="/aula/{{ $area->slug }}" class="list-group-item list-group-item-action">{{ $area->name }}</a>
      @endforeach
    @else
      <a href="/users/{{ Auth::user()->username }}#update" class="list-group-item list-group-item-action">Actualiza tu perfil</a>
    @endif
    </div>
  </div>
</div>
@endif