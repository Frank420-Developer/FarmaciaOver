<nav class="navbar navbar-expand-lg navbar-light bg-dark justify-content-between navegacion" style="border-bottom: 1px solid #000;">

  <button class="btn btn-outline-dark boton-sidebar" id="menu-toggle">
    <i class="fas fa-home fa-2x"></i>
  </button>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <!-- <form class="form-inline my-2 my-lg-0 position-relative">
      <input class="form-control" type="search" placeholder="Buscar..." aria-label="Buscar...">
      <button class="my-2 position-absolute buscar" type="submit"><i class="fas fa-search fa-2x"></i></button></input>
    </form> -->
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user"></i> 
        </a>
        <div class="dropdown-menu mr-3" aria-labelledby="navbarDropdown">
          <a class="dropdown-item lead" href="#">Perfil</a>
          <a class="dropdown-item lead" href="#">Configuraciones</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item lead" href="<?= $data['host']?>/login">Cerrar Sesión</a>
        </div>
      </li>
    </ul>
  </div>
</nav>