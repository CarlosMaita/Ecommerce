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
    <link href="../../css/new.css" rel="stylesheet">
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
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Desarrollo</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Colores</li>
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
                  <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Colores en Base de Datos</h4>
                      <h6 class="card-subtitle">Estos colores serán usados para filtrar las busquedas en la página web.</h6>
                    </div>
                    <div class="row justify-content-center mt-1 bg-white py-2">
                      <h3>Agregue el nuevo usuario</h3>
                    </div>
                    <form class="" action=".php" method="post">
                    <div class="row mt-3 justify-content-center">
                      <div class="input-group mb-3 col-6">
                        <div class="input-group-append">
                          <span class="input-group-text"><b>Nombre</b></span>
                        </div>
                        <input type="text" name="color" class="form-control text-secondary" placeholder="Ingrese el nombre del color">
                      </div>
                      <div class="input-group mb-3 col-1">
                        <input type="color" name="color_hexa" class="form-control text-secondary" placeholder="Ingrese el apellido">
                      </div>
                    </div>
                    <div class="row justify-content-center mb-3">
                      <button type="submit" class="btn btn-outline-primary">Agregar</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
                <div class="row mt-3 justify-content-center">
                  <div class="col-10">
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
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><span class="dot" style="background-color:#123e45;"></span></td>
                            <td>Azul</td>
                            <td><button type="button" class="btn btn-outline-danger btn-sm">Eliminar</button></td>
                          </tr>
                          <tr>
                            <td><span class="dot" style="background-color:#1a3e45;"></span></td>
                            <td>Verde</td>
                            <td><button type="button" class="btn btn-outline-danger btn-sm">Eliminar</button></td>
                          </tr>
                          <tr>
                            <td><span class="dot" style="background-color:#1bae45;"></span></td>
                            <td>Rojo</td>
                            <td><button type="button" class="btn btn-outline-danger btn-sm">Eliminar</button></td>
                          </tr>
                          <tr>
                            <td><span class="dot" style="background-color:#9a3eb5;"></span></td>
                            <td>Negro</td>
                            <td><button type="button" class="btn btn-outline-danger btn-sm">Eliminar</button></td>
                          </tr>
                          <tr>
                            <td><span class="dot" style="background-color:#9a1115;"></td>
                            <td>Blanco</td>
                            <td><button type="button" class="btn btn-outline-danger btn-sm">Eliminar</button></td>
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