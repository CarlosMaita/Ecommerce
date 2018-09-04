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
                        <h4 class="page-title">Inventario</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="../principal.php">Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Inventario</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Añadir/Eliminar Producto</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Modificar Producto</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
              <div class="row justify-content-center mt-1 bg-white py-2">
                <h3>Modifique las caracteristicas</h3>
              </div>
              <form class="" action=".php" method="post">
              <div class="row mt-3">
                <div class="input-group mb-3 col-6">
                  <div class="input-group-append">
                    <span class="input-group-text"><b>Nombre del Producto</b></span>
                  </div>
                  <input type="text" name="nombre_p" class="form-control text-secondary" placeholder="Ingrese el nombre">
                </div>
                <div class="input-group mb-3 col-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text"><b>Prenda</b></label>
                  </div>
                  <select name="tipo" class="custom-select text-secondary">
                    <option value="franela">Franela</option>
                    <option value="chemise">Chemise</option>
                    <option value="pantalón">Pantalón</option>
                    <option value="camisa">Camisa</option>
                  </select>
                </div>
                <div class="input-group mb-3 col-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text"><b>Genero</b></label>
                  </div>
                  <select name="genero" class="custom-select text-secondary">
                    <option value="dama">Dama</option>
                    <option value="Caballero">Caballero</option>
                    <option value="Niño">Niño</option>
                    <option value="Niña">Niña</option>
                  </select>
                </div>
                <div class="input-group mb-3 col-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text"><b>Marca</b></label>
                  </div>
                  <select class="custom-select text-secondary">
                    <option value="Rouxa">Rouxa</option>
                    <option value="Nike">Nike</option>
                    <option value="Polo">Polo</option>
                    <option value="Adidas">Adidas</option>
                  </select>
                </div>
                <div class="input-group mb-3 col-3">
                  <div class="input-group-append">
                    <span class="input-group-text"><b>Material</b></span>
                  </div>
                  <input type="text" name="material" class="form-control text-secondary" placeholder="Ej: Algodon">
                </div>
                <div class="input-group mb-3 col-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text"><b>Cuello</b></label>
                  </div>
                  <select name="cuello" class="custom-select text-secondary">
                    <option value="Redondo">Redondo</option>
                    <option value="En V">En V</option>
                    <option value="No Aplica">No Aplica</option>
                  </select>
                </div>
                <div class="input-group mb-3 col-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text"><b>Manga</b></label>
                  </div>
                  <select name="manga" class="custom-select text-secondary">
                    <option value="Corta">Corta</option>
                    <option value="3/4">3/4</option>
                    <option value="Larga">Larga</option>
                    <option value="Sin Manga">Sin Manga</option>
                    <option value="No Aplica">No Aplica</option>
                  </select>
                </div>
                <div class="input-group mb-3 col-3">
                  <div class="input-group-append">
                    <span class="input-group-text"><b>Precio</b></span>
                  </div>
                  <input type="number" name="precio" class="form-control text-secondary" placeholder="Precio al detal">
                </div>
                <div class="input-group mb-3 col-9">
                  <div class="input-group-append">
                    <span class="input-group-text"><b>Descripción</b></span>
                  </div>
                  <input type="text" name="descripcion" class="form-control text-secondary" placeholder="Describa el producto, esta descripcion será visible por el cliente">
                </div>
                <div class="col-12">
                  <input class="form-group" name="archivo" type="file"/>
                </div>
              </div>
              <div class="row justify-content-center mb-3">
                <a class="btn btn-outline-danger col-auto" href="producto.php">Cancelar</a>
                <button type="submit" class="btn btn-outline-primary col-auto">Modificar</button>
              </div>
              </form>
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
