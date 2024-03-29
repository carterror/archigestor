  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{route('inicio')}}" class="navbar-brand">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" width="25px" class="brand-image "
             style="opacity: .8">
        <span class="brand-text font-weight-light">Archivo Mujeres</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{route('inicio')}}" class="nav-link">Inicio</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Contacto</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Edición</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{ route('autor.index') }}" class="dropdown-item">Autores </a></li>
              <li><a href="{{ route('publicacion.index') }}" class="dropdown-item">Publicaciones </a></li>
              <!-- End Level two -->
            </ul>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </nav>
  <!-- /.navbar -->