<header class="topbar" data-navbarbg="skin6">
<nav class="navbar top-navbar navbar-expand-md navbar-light">
    <div class="navbar-header" data-logobg="skin5">
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
            <i class="ti-menu ti-close"></i>
        </a>
        <div class="navbar-brand">
            <a href="principal.php" class="logo">
                Rouxa - Administración
            </a>
        </div>
        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="ti-more"></i>
        </a>
    </div>
    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin6">
        <ul class="navbar-nav float-left mr-auto">
            <li class="nav-item search-box">
                <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                    <div class="d-flex align-items-center">
                        <i class="mdi mdi-magnify font-20 mr-1"></i>
                        <div class="ml-1 d-none d-sm-block">
                            <span>Buscar</span>
                        </div>
                    </div>
                </a>
                <form class="app-search position-absolute">
                    <input type="text" class="form-control" placeholder="Buscar &amp; enter">
                    <a class="srh-btn">
                        <i class="ti-close"></i>
                    </a>
                </form>
            </li>
        </ul>
        <ul class="navbar-nav float-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../imagen/favicon.jpg" alt="user" class="rounded-circle" width="31"></a>
                <div class="dropdown-menu dropdown-menu-right user-dd animated">
                    <a class="dropdown-item" href="common/configuracion.php"><i class="ti-user m-r-5 m-l-5"></i>Mi Perfil</a>
                    <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#closeSesion"><i class="ti-export m-r-5 m-l-5"></i>Cerrar sesión</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
</header>
<aside class="left-sidebar" data-sidebarbg="skin5">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="administracion/index.php" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Administración</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="desarrollo/" aria-expanded="false">
                        <i class="mdi mdi-account-network"></i>
                        <span class="hide-menu">Desarrollo</span>
                    </a>
                </li>
                 <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="inventario/" aria-expanded="false">
                        <i class="mdi mdi-arrange-bring-forward"></i>
                        <span class="hide-menu">Inventario</span>
                    </a>
                </li>
                <li class="sidebar-item">
                   <a class="sidebar-link waves-effect waves-dark sidebar-link" href="ventas/" aria-expanded="false">
                       <i class="mdi mdi-cart"></i>
                       <span class="hide-menu">Ventas</span>
                   </a>
               </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="despacho/" aria-expanded="false">
                        <i class="mdi mdi-truck"></i>
                        <span class="hide-menu">Despacho</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="common/configuracion.php" aria-expanded="false">
                        <i class="mdi mdi-wrench"></i>
                        <span class="hide-menu">Configuracion</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<div class="modal fade" id="closeSesion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="closeSesionLabel">Cerrar sesión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Desea cerrar sesión?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <a href="common/salir_sesion.php" class="btn btn-primary">Salir</a>
      </div>
    </div>
  </div>
</div>
