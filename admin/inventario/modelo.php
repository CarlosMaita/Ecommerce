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
    <link href="../../css/new.css" rel="stylesheet">
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
                  <h4 class="page-title">Inventario</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="../principal">Inicio</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="index.php">Inventario</a>
                                </li>
                                  <li class="breadcrumb-item active" aria-current="page">Añadir/Eliminar Modelo</li>
                            </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-4 text-center">
                  <a class="btn btn-link text-success" href="producto.php">Agregar/Eliminar Producto</a>
                </div>
                <div class="col-4 text-center">
                  <a class="btn btn-link text-success" href="modelo.php">Agregar/Eliminar Modelo</a>
                </div>
                <div class="col-4 text-center">
                  <a class="btn btn-link text-success" href="tallas.php">Agregar/Eliminar Talla</a>
                </div>
              </div>
              <div class="row justify-content-center mt-1 bg-white py-2">
                <h3>Agregue las caracteristicas del modelo</h3>
              </div>
              <form class="" action="addProducto.php" method="post">
              <div class="row mt-3">
                <div class="input-group mb-3 col-6">
                  <div class="input-group-prepend">
                    <label class="input-group-text"><b>Seleccione el producto</b></label>
                  </div>
                  <select name="tipo" class="custom-select text-secondary">
                    <option value="franela">Franela Rouxa de Dama</option>
                    <option value="chemise">Chemise Polo de Caballero</option>
                    <option value="pantalón">Pantalón Wranger de Caballero</option>
                    <option value="camisa">Camisa Rouxa de Dama</option>
                  </select>
                </div>
                <div class="input-group mb-3 col-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text"><b>Color principal</b></label>
                  </div>
                  <select name="tipo" class="custom-select text-secondary">
                    <option value="ID-BBDD" style="color:#123e45;">Rojo</option>
                    <option value="ID-BBDD"></span>Verde</option>
                    <option value="ID-BBDD">Amarillo</option>
                    <option value="ID-BBDD">Azul</option>
                  </select>
                </div>
                <div class="input-group mb-3 col-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text"><b>Color secundario</b></label>
                  </div>
                  <select name="tipo" class="custom-select text-secondary">
                    <option value="ID-BBDD">Rojo</option>
                    <option value="ID-BBDD">Verde</option>
                    <option value="ID-BBDD">Amarillo</option>
                    <option value="ID-BBDD">Azul</option>
                  </select>
                </div>
                <div class="col-12">
                  <input class="form-group" name="archivo" type="file"/>
                </div>
              </div>
              <div class="row justify-content-center mb-3">
                <button type="submit" class="btn btn-outline-primary">Agregar</button>
              </div>
              </form>
                <div class="row mt-3">
                  <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Productos en Inventario</h4>
                      <h6 class="card-subtitle">Aca podras ver los productos que se encuentran en el inventario.</h6>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Genero</th>
                            <th scope="col">Prenda</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Precio</th>
                            <th>C. Principal</th>
                            <th>C. Secundario</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td scope="row"><img src="" alt=""/> </td>
                            <th>Franela Rouxa</th>
                            <td>Dama</td>
                            <td>Franela</td>
                            <td>Rouxa</td>
                            <td>150,00</td>
                            <td><span class="dot2" style="background-color:#1bae45;"></span>Rojo</td>
                            <td><span class="dot2" style="background-color:#1bae45;"></span>Azul</td>
                            <td><button type="button" class="btn btn-outline-danger btn-sm">Eliminar</button></td>
                          </tr>
                          <tr>
                            <td scope="row"><img src="" alt=""/></td>
                            <th>Chemise Polo</th>
                            <td>Caballero</td>
                            <td>Chemise</td>
                            <td>Polo</td>
                            <td>200,00</td>
                            <td><span class="dot2" style="background-color:#1bae45;"></span>Rojo</td>
                            <td><span class="dot2" style="background-color:#1bae45;"></span>Azul</td>
                            <td><button type="button" class="btn btn-outline-danger btn-sm">Eliminar</button></td>
                          </tr>
                          <tr>
                            <td scope="row"><img src="" alt=""/></td>
                            <th>Franela Nike</th>
                            <td>Dama</td>
                            <td>Franela</td>
                            <td>Nike</td>
                            <td>120,00</td>
                            <td><span class="dot2" style="background-color:#1bae45;"></span>Rojo</td>
                            <td><span class="dot2" style="background-color:#1bae45;"></span>Azul</td>
                            <td><button type="button" class="btn btn-outline-danger btn-sm">Eliminar</button></td>
                          </tr>
                          <tr>
                            <td scope="row"><img src="" alt=""/></td>
                            <th>Chemise Polo</th>
                            <td>Caballero</td>
                            <td>Chemise</td>
                            <td>Polo</td>
                            <td>200,00</td>
                            <td><span class="dot2" style="background-color:#1bae45;"></span>Rojo</td>
                            <td><span class="dot2" style="background-color:#1bae45;"></span>Azul</td>
                            <td><button type="button" class="btn btn-outline-danger btn-sm">Eliminar</button></td>
                          </tr>
                          <tr>
                            <td scope="row"><img src="" alt=""/></td>
                            <th>Franela Nike</th>
                            <td>Dama</td>
                            <td>Franela</td>
                            <td>Nike</td>
                            <td>120,00</td>
                            <td><span class="dot2" style="background-color:#1bae45;"></span>Rojo</td>
                            <td><span class="dot2" style="background-color:#1bae45;"></span>Azul</td>
                            <td><button type="button" class="btn btn-outline-danger btn-sm">Eliminar</button></td>
                          </tr>
                          <tr>
                            <td scope="row"><img src="" alt=""/></td>
                            <th>Chemise Polo</th>
                            <td>Caballero</td>
                            <td>Chemise</td>
                            <td>Polo</td>
                            <td>200,00</td>
                            <td><span class="dot2" style="background-color:#1bae45;"></span>Rojo</td>
                            <td><span class="dot2" style="background-color:#1bae45;"></span>Azul</td>
                            <td><button type="button" class="btn btn-outline-danger btn-sm">Eliminar</button></td>
                          </tr>
                          <tr>
                            <td scope="row"><img src="" alt=""/></td>
                            <th>Franela Nike</th>
                            <td>Dama</td>
                            <td>Franela</td>
                            <td>Nike</td>
                            <td>120,00</td>
                            <td><span class="dot2" style="background-color:#1bae45;"></span>Rojo</td>
                            <td><span class="dot2" style="background-color:#1bae45;"></span>Azul</td>
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
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
</body>
</html>
