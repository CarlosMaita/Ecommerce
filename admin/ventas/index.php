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
                                            <th class="border-top-0">Fecha de Compra</th>
                                            <th class="border-top-0">Artículos</th>
                                            <th class="border-top-0">Total (Bs)</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="txt-oflo">Ali Baba</td>
                                            <td><span class="label label-info label-rounded">Por Empaquetar</span></td>
                                            <td class="txt-oflo">Abril 19, 2018</td>
                                            <td><span class="font-medium"><button type="button" class="enlace2 ml-auto" href="javascript:void(0)" data-toggle="modal" data-target="#ver_id2">Ver artículos</button></span></td>
                                            <td><span class="font-medium">1.250,00</span></td>
                                            <td><a href="javascript:void(0)" data-toggle="modal" data-target="#edit_id"><i title="Revisar" data-toggle="tooltip" class="ti-pencil-alt"></i></a></td>
                                        </tr>
                                        <div class="modal fade bd-example-modal-lg" id="ver_id2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="closeSesionLabel">Pedido de Pedro Picapiedra</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <div class="container-fluid">
                                                  <div class="row">
                                                    <div class="col-2 text-center">
                                                      <img class="img-fluid" src="../../imagen/1cc3633c579a90cfdd895e64021e2163.jpg" width="70px" height="70px">
                                                    </div>
                                                    <div class="col-8">
                                                      <div class="container-fluid">
                                                        <div class="row">
                                                          <div class="col-auto">
                                                            <b>Frenela Nike xxxxxx</b>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="row">
                                                              <div class="col-8">
                                                                <small class="d-block">TALLA: <span class="text-muted">M</span></small>
                                                                <small class="d-block">CANTIDAD: <span class="text-muted">12</span></small>
                                                              </div>
                                                              <div class="col-4">
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <hr>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal fade bd-example-modal-lg" id="edit_id" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <div class="row">
                                                  <div class="col-6">
                                                    <h5 class="modal-title" id="closeSesionLabel">A Enviar por Domesa</h5>
                                                  </div>
                                                  <div class="col-6">
                                                    <span class="label label-info label-rounded">Por Empaquetar</span>
                                                  </div>
                                                </div>
                                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <div class="container-fluid">
                                                  <div class="row">
                                                    <div class="col-12">
                                                      <div class="container-fluid">
                                                        <div class="row">
                                                          <div class="col-auto">
                                                            <b>Datos de Cliente</b>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="row">
                                                              <div class="col-6">
                                                                <small class="d-block">Nombre: <span class="text-muted">Pablo Marmol</span></small>
                                                                <small class="d-block">Teléfono: <span class="text-muted">0214-2134567</span></small>
                                                              </div>
                                                              <div class="col-6">
                                                                <small class="d-block">Cédula: <span class="text-muted">V-23413234</span></small>
                                                                <small class="d-block">Email: <span class="text-muted">marmol@gmail.com</span></small>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                          <div class="col-auto">
                                                            <b>Datos de Envío</b>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="row">
                                                              <div class="col-6">
                                                                <small class="d-block">Enviar a: <span class="text-muted">Clark Kent</span></small>
                                                                <small class="d-block">Teléfono: <span class="text-muted">0416-3425456</span></small>
                                                                <small class="d-block">País: <span class="text-muted">Zimbawe</span></small>
                                                                <small class="d-block">Municipio: <span class="text-muted">Naguanagua</span></small>
                                                                <small class="d-block">Dirección: <span class="text-muted">Naguanagua</span></small>
                                                                <small class="d-block">Código Postal: <span class="text-muted">2013</span></small>
                                                              </div>
                                                              <div class="col-6">
                                                                <small class="d-block">Cedula: <span class="text-muted">500.000.000</span></small>
                                                                <small class="d-block">Estado: <span class="text-muted">Moscu</span></small>
                                                                <small class="d-block">Parroquia: <span class="text-muted">Moscu</span></small>
                                                                <small class="d-block">Referencia: <span class="text-muted">Cerca de mi casa</span></small>
                                                              </div>
                                                              <div class="col-12">
                                                                <small class="d-block">Observaciones: <span class="text-muted">Vienes por aca, cruzas por alla y llegas hasta aqui</span></small>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <hr>
                                                  <div class="co-12">
                                                    <b>Factura Fiscal:</b>
                                                    <small class="d-block">Razon Social: <span class="text-muted">Rouxa</span></small>
                                                    <small class="d-block">Rif: <span class="text-muted">G-123456789</span></small>
                                                    <small class="d-block">Direccion Fiscal: <span class="text-muted">por aqui estoy, y aqui esta la empresa.</span></small>
                                                  </div>
                                                </div>
                                                <hr>
                                                <h2 class="text-center">Peso: 450 gr</h2>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <tr>
                                            <td class="txt-oflo">Peter Parker</td>
                                            <td><span class="label label-purple label-rounded">Por Buscar</span></td>
                                            <td class="txt-oflo">April 19, 2017</td>
                                            <td><span class="font-medium"><button type="button" class="enlace2 ml-auto" href="javascript:void(0)" data-toggle="modal" data-target="#ver_id3">Ver artículos</button></span></td>
                                            <td><span class="font-medium">1000,00</span></td>
                                            <td><a href="javascript:void(0)" data-toggle="modal" data-target="#edit_id2"><i title="Revisar" data-toggle="tooltip" class="ti-pencil-alt"></i></a></td>
                                        </tr>
                                        <div class="modal fade bd-example-modal-lg" id="ver_id3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="closeSesionLabel">Pedido de Pedro Picapiedra</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <div class="container-fluid">
                                                  <div class="row">
                                                    <div class="col-2 text-center">
                                                      <img class="img-fluid" src="../../imagen/1cc3633c579a90cfdd895e64021e2163.jpg" width="70px" height="70px">
                                                    </div>
                                                    <div class="col-8">
                                                      <div class="container-fluid">
                                                        <div class="row">
                                                          <div class="col-auto">
                                                            <b>Frenela Nike xxxxxx</b>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="row">
                                                              <div class="col-8">
                                                                <small class="d-block">TALLA: <span class="text-muted">M</span></small>
                                                                <small class="d-block">CANTIDAD: <span class="text-muted">12</span></small>
                                                              </div>
                                                              <div class="col-4">
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <hr>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="modal fade bd-example-modal-lg" id="edit_id2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <div class="row">
                                                  <div class="col-6">
                                                    <h5 class="modal-title" id="closeSesionLabel">A Enviar por Domesa</h5>
                                                  </div>
                                                  <div class="col-6">
                                                    <span class="label label-info label-rounded">Por Empaquetar</span>
                                                  </div>
                                                </div>
                                                <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                <div class="container-fluid">
                                                  <div class="row">
                                                    <div class="col-12">
                                                      <div class="container-fluid">
                                                        <div class="row">
                                                          <div class="col-auto">
                                                            <b>Datos de Cliente</b>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="row">
                                                              <div class="col-6">
                                                                <small class="d-block">Nombre: <span class="text-muted">Pablo Marmol</span></small>
                                                                <small class="d-block">Teléfono: <span class="text-muted">0214-2134567</span></small>
                                                              </div>
                                                              <div class="col-6">
                                                                <small class="d-block">Cédula: <span class="text-muted">V-23413234</span></small>
                                                                <small class="d-block">Email: <span class="text-muted">marmol@gmail.com</span></small>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                          <div class="col-auto">
                                                            <b>Datos de Envío</b>
                                                          </div>
                                                          <div class="col-12">
                                                            <div class="row">
                                                              <div class="col-6">
                                                                <small class="d-block">Enviar a: <span class="text-muted">Clark Kent</span></small>
                                                                <small class="d-block">Teléfono: <span class="text-muted">0416-3425456</span></small>
                                                                <small class="d-block">País: <span class="text-muted">Zimbawe</span></small>
                                                                <small class="d-block">Municipio: <span class="text-muted">Naguanagua</span></small>
                                                                <small class="d-block">Dirección: <span class="text-muted">Naguanagua</span></small>
                                                                <small class="d-block">Código Postal: <span class="text-muted">2013</span></small>
                                                              </div>
                                                              <div class="col-6">
                                                                <small class="d-block">Cedula: <span class="text-muted">500.000.000</span></small>
                                                                <small class="d-block">Estado: <span class="text-muted">Moscu</span></small>
                                                                <small class="d-block">Parroquia: <span class="text-muted">Moscu</span></small>
                                                                <small class="d-block">Referencia: <span class="text-muted">Cerca de mi casa</span></small>
                                                              </div>
                                                              <div class="col-12">
                                                                <small class="d-block">Observaciones: <span class="text-muted">Vienes por aca, cruzas por alla y llegas hasta aqui</span></small>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <hr>
                                                  <div class="co-12">
                                                    <b>Factura Fiscal:</b>
                                                    <small class="d-block">Razon Social: <span class="text-muted">Rouxa</span></small>
                                                    <small class="d-block">Rif: <span class="text-muted">G-123456789</span></small>
                                                    <small class="d-block">Direccion Fiscal: <span class="text-muted">por aqui estoy, y aqui esta la empresa.</span></small>
                                                  </div>
                                                </div>
                                                <hr>
                                                <h2 class="text-center">Peso: 450 gr</h2>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <tr>
                                            <td class="txt-oflo">Alex Gonzalez</td>
                                            <td><span class="label label-warning label-rounded">Por Enviar</span></td>
                                            <td class="txt-oflo">Diciembre 20, 2018</td>
                                            <td><span class="font-medium"><button type="button" class="enlace2 ml-auto" href="javascript:void(0)" data-toggle="modal" data-target="#ver_id3">Ver artículos</button></span></td>
                                            <td><span class="font-medium">450,00</span></td>
                                            <td><a href="#"><i title="Revisar" data-toggle="tooltip" class="ti-pencil-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="txt-oflo">Pedro Picapiedra</td>
                                            <td><span class="label label-warning label-rounded">Por Enviar</span></td>
                                            <td class="txt-oflo">April 21, 2017</td>
                                            <td><span class="font-medium"><button type="button" class="enlace2 ml-auto" href="javascript:void(0)" data-toggle="modal" data-target="#ver_id3">Ver artículos</button></span></td>
                                            <td><span class="font-medium">300,00</span></td>
                                            <td><a href="#"><i title="Revisar" data-toggle="tooltip" class="ti-pencil-alt"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="txt-oflo">Juana la Iguana</td>
                                            <td><span class="label label-danger label-rounded">En Falla</span> </td>
                                            <td class="txt-oflo">April 23, 2017</td>
                                            <td><span class="font-medium"><button type="button" class="enlace2 ml-auto" href="javascript:void(0)" data-toggle="modal" data-target="#ver_id3">Ver artículos</button></span></td>
                                            <td><span class="font-medium">3.000,00</span></td>
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
