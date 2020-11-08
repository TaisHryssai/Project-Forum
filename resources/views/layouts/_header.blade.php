<div class="fixed-top header py-2" style="background-color: white;">
  <div class="container-fluid">
    <div class="d-flex">
      <a class="" href="{{route('index.topic')}}">
      <img src="{{ asset('assets/images/forum-icon.png') }}" class="header-brand-img" alt="tabler logo" style="width: 15%;">
      </a>
      <div class="d-flex order-lg-2 ml-auto">
        <div class="dropdown">
          <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown" >
          <span class="avatar">Opções</span>
            <span class="ml-2 d-none d-lg-block">
              <span class="text-default">  </span>
              <small class="text-muted d-block mt-1">  </small>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a class="dropdown-item" href="{{route('index.topic')}}"> <i class="dropdown-icon far fa-user"></i>  Tópicos </a>
            <a class="dropdown-item" href=""> <i class="dropdown-icon far fa-user"></i>  Sair </a>
            </a>
          </div>
        </div>
      </div>
      <a href="#" class="header-toggler d-lg-none d-md-none ml-3" data-toggle="collapse" data-target="#headerMenuCollapse" aria-expanded="true" >
        <i class= "header-toggler-icon"></i>
      </a>
    </div>
  </div>
</div>