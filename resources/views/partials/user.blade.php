@if(Auth::check())
<div class="sidebar">
  @include('partials.cards.user', ['user' => Auth::user()])
  <div class="list-group">
    <span class="list-group-item active"><strong>Desafío de preguntas</strong></span>
    <a href="/questions" class="list-group-item list-group-item-action">Iniciar un desafio</a>
    <a href="#" class="list-group-item list-group-item-action">Resultados</a>
    <a href="/questions/cooperate" class="list-group-item list-group-item-action">Colaborar</a>
  </div>
  <div class="list-group">
    <span class="list-group-item active"><strong>Aulas virtuales</strong></span>
    <a href="#" class="list-group-item list-group-item-action">Matemáticas 9°</a>
  </div>
</div>
@endif