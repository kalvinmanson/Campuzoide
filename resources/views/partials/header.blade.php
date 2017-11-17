<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <a class="navbar-brand" href="/">
      <img src="/img/icon.png" width="30" height="30" class="d-inline-block align-top" alt="Campuzoide">
      Campuzoide
    </a>
    @if(Auth::user())
      <button class="navbar-toggler ml-auto mr-1" type="button" data-toggle="collapse" data-target="#sideBar">
        <i class="fa fa-dashboard"></i>
      </button>
    @endif
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-user"></i>
    </button>

    <div class="collapse navbar-collapse" id="mainMenu">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/blog">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/campuzoide/como-funciona">¿Cómo funciona?</a>
        </li>
      </ul>
      <form class="form-inline">
        <div class="input-group">
          <input type="text" class="form-control" name="q" placeholder="Buscar..." aria-label="Buscar..." required>
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
    </form>

      <ul class="navbar-nav ml-auto">
        @if(Auth::user())
        
        <li class="nav-item">
          <a class="nav-link" href="/users/{{ Auth::user()->username }}">Mi cuenta</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fa fa-power-off"></i>
              <span class="d-sm-none"> Cerrar sesión</span>
            </a>
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
</header>