@if(Auth::check())
<div class="sidebar">
  <div class="card text-white bg-primary">
    <div class="card-header">Hola, {{ Auth::user()->name }}</div>
    <div class="card-body">
      <div class="row">
          <div class="col-2 p-0">
              <img src="{{ Auth::user()->picture ? Auth::user()->picture : "/img/user.png" }}" class="img-fluid">
          </div>
          <div class="col-10">
              <h4>Ranking: {{ Auth::user()->rank }}</h4>
              <small>Realiza desafios de preguntas, gana medallas y mejora tu ranking.</small>
          </div>
      </div>
    </div>
  </div>
  <div class="list-group">
    <span class="list-group-item active"><strong>Desafío de preguntas</strong></span>
    <a href="/questions" class="list-group-item list-group-item-action">Iniciar un desafio</a>
    <a href="#" class="list-group-item list-group-item-action">Resultados</a>
    <a href="#" class="list-group-item list-group-item-action">Examenes</a>
    <a href="/questions/cooperate" class="list-group-item list-group-item-action">Colaborar</a>
  </div>
  <div class="list-group">
    <span class="list-group-item active"><strong>Aulas virtuales</strong></span>
    <a href="#" class="list-group-item list-group-item-action">Matemáticas 9°</a>
  </div>
</div>
@endif