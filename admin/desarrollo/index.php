<?php
include_once('../common/sesion2.php');
require('../../common/conexion.php');
 ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Administración de la E-Comerce Rouxa.">
    <meta name="author" content="Eutuxia Web, C.A.">
    <link rel="icon" type="image/jpg" sizes="16x16" href="../../imagen/favicon.jpg">
    <title>Rouxa - Administración</title>
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
        <?php include('../common/navbar2.php'); ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Desarrollo</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="../principal.php">Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Desarrollo</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row justify-content-around">
                    <div class="col-4 text-center">
                      <a class="btn btn-link text-success" href="usuarios.php">Agregar/Eliminar Usuario</a>
                    </div>
                    <div class="col-4 text-center">
                      <a class="btn btn-link text-success" href="colores.php">Agregar/Eliminar Color</a>
                    </div>
                </div>
                <div class="row mt-3">
                  <div class="col-6">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Usuarios en Base de Datos</h4>
                      <h6 class="card-subtitle">Usuarios registrados en la Base de Datos.</h6>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Usuario</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Permisos</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>alexisamm9261@gmail.com</td>
                            <td>Alexis Montilla</td>
                            <td>Administrador</td>
                          </tr>
                          <tr>
                            <td>carlosmaita2009@gmail.com</td>
                            <td>Carlos Maita</td>
                            <td>Administrador</td>
                          </tr>
                          <tr>
                            <td>luis.baez315@gmail.com</td>
                            <td>Luis Baez</td>
                            <td>Administrador</td>
                          </tr>
                          <tr>
                            <td>pedropicapiedra@gmail.com</td>
                            <td>Pedro Picapiedra</td>
                            <td>Vendedor</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                  <div class="col-6">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Colores en Base de Datos</h4>
                      <h6 class="card-subtitle">Estos colores serviran de filtro en las busquedas de la página</h6>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Color</th>
                            <th scope="col">Nombre</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><img src="BBDD" alt=""></td>
                            <td>Azul</td>
                          </tr>
                          <tr>
                            <td><img src="BBDD" alt=""></td>
                            <td>Verde</td>
                          </tr>
                          <tr>
                            <td><img src="BBDD" alt=""></td>
                            <td>Rojo</td>
                          </tr>
                          <tr>
                            <td><img src="BBDD" alt=""></td>
                            <td>Negro</td>
                          </tr>
                          <tr>
                            <td><img src="BBDD" alt=""></td>
                            <td>Blanco</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                </div>
            </div>
            <?php include('../common/footer.php'); ?>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="../dist/js/waves.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <script src="../dist/js/custom.min.js"></script>
</body>
</html>