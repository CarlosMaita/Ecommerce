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
                        <h4 class="page-title">Ventas</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="../principal.php">Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Ventas</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Cliente</th>
                                            <th class="border-top-0">Estatus</th>
                                            <th class="border-top-0">Fecha</th>
                                            <th class="border-top-0">Articulos</th>
                                            <th class="border-top-0">Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="txt-oflo">Pablo Marmol</td>
                                            <td><span class="label label-success label-rounded">Pagado</span> </td>
                                            <td class="txt-oflo">Enero 18, 2018</td>
                                            <td><span class="font-medium">Franelas Dama, Chemise Caballero</span></td>
                                            <td><span class="font-medium">$24</span></td>
                                            <td><a href="#"><i title="Revisar" data-toggle="tooltip" class="ti-pencil-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="txt-oflo">Ali Baba</td>
                                            <td><span class="label label-info label-rounded">En revision</span></td>
                                            <td class="txt-oflo">Abril 19, 2018</td>
                                            <td><span class="font-medium">Franelas Dama, Chemise Caballero</span></td>
                                            <td><span class="font-medium">$1250</span></td>
                                            <td><a href="#"><i title="Revisar" data-toggle="tooltip" class="ti-pencil-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="txt-oflo">Peter Parker</td>
                                            <td><span class="label label-purple label-rounded">Finalizado</span></td>
                                            <td class="txt-oflo">April 19, 2017</td>
                                            <td><span class="font-medium">Franelas Dama, Chemise Caballero</span></td>
                                            <td><span class="font-medium">$1250</span></td>
                                            <td><a href="#"><i title="Revisar" data-toggle="tooltip" class="ti-pencil-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="txt-oflo">Alex Gonzalez</td>
                                            <td><span class="label label-success label-rounded">Pagado</span></td>
                                            <td class="txt-oflo">Diciembre 20, 2018</td>
                                            <td><span class="font-medium">Franelas Dama, Chemise Caballero</span></td>
                                            <td><span class="font-medium">-$24</span></td>
                                            <td><a href="#"><i title="Revisar" data-toggle="tooltip" class="ti-pencil-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="txt-oflo">Pedro Picapiedra</td>
                                            <td><span class="label label-success label-rounded">Pagado</span></td>
                                            <td class="txt-oflo">April 21, 2017</td>
                                            <td><span class="font-medium">Franelas Dama, Chemise Caballero</span></td>
                                            <td><span class="font-medium">$24</span></td>
                                            <td><a href="#"><i title="Revisar" data-toggle="tooltip" class="ti-pencil-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="txt-oflo">Juana la Iguana</td>
                                            <td><span class="label label-danger label-rounded">Cancelado</span> </td>
                                            <td class="txt-oflo">April 23, 2017</td>
                                            <td><span class="font-medium">Franelas Dama, Chemise Caballero</span></td>
                                            <td><span class="font-medium">-$14</span></td>
                                            <td><a href="#"><i title="Revisar" data-toggle="tooltip" class="ti-pencil-alt"></i></a></td>
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
