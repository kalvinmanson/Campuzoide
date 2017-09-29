<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-primary">
  <a class="navbar-brand" href="/">
    <img src="/img/icon.png" width="30" height="30" class="d-inline-block align-top" alt="Campuzoide">
    Campuzoide
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/blog">Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/campuzoide/como-funciona">¿Cómo funciona?</a>
      </li>
    </ul>
    <form class="form-inline">
      <input class="form-control" type="text" placeholder="Buscar" aria-label="Buscar">
      <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
    </form>

    <ul class="navbar-nav ml-auto">
      @if(Auth::user())
      
      <li class="nav-item">
        <a class="nav-link" href="/users/{{ Auth::user()->username }}">Mi cuenta</a>
      </li>
      <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link" href="/login">Entrar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/register">Soy nuevo</a>
      </li>
      @endif
    </ul>
  </div>
</nav>