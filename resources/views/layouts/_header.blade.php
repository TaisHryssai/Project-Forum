<nav class="navbar navbar-expand-lg navbar-light" style="background-color: white">
  <a class="navbar-brand" href="{{ route('index.topic') }}">Fórum Tec</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 90%">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
          <a class="dropdown-item" rel="nofollow" data-method="delete" href="{{ route('logout.user') }}" id="logout"> Sair  </a>
      </li>
    </ul>
  </div>
</nav>