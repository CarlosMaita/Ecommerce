<?php
  include('common/sesion.php');
 ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/jpg" sizes="16x16" href="../imagen/favicon.jpg">
    <title>Rouxa Administración</title>
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
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
            <?php include('common/navbar.php'); ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Principal</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="principal.php">Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Principal</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ventas Recientes</h4>
                            </div>
                            <div class="comment-widgets" style="height:90vh;">
                              <div class="d-flex flex-row comment-row m-t-0">
                                  <div class="comment-text w-100">
                                      <h6 class="font-medium">Steve Jobs</h6>
                                      <span class="m-b-15 d-block">4 Franelas de Dama Rouxa, 1 Chemise de Caballero Polo. --- BBDD</span>
                                      <div class="comment-footer">
                                          <span class="text-muted float-right">Abril 14, 2016</span>
                                          <span class="label label-rounded label-success">Finalizado</span>
                                          <span class="action-icons">
                                              <a href="javascript:void(0)" title="Revisar" data-toggle="tooltip">
                                                  <i class="ti-pencil-alt"></i>
                                              </a>
                                              <a href="javascript:void(0)" title="Finalzar" data-toggle="tooltip">
                                                  <i class="ti-check"></i>
                                              </a>
                                          </span>
                                      </div>
                                  </div>
                              </div>
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">Dinkiwinki</h6>
                                        <span class="m-b-15 d-block">4 Franelas de Dama Rouxa, 1 Chemise de Caballero Polo. --- BBDD</span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">Abril 14, 2016</span>
                                            <span class="label label-rounded label-danger">Pagado</span>
                                            <span class="action-icons">
                                                <a href="javascript:void(0)" title="Revisar" data-toggle="tooltip">
                                                    <i class="ti-pencil-alt"></i>
                                                </a>
                                                <a href="javascript:void(0)" title="Finalzar" data-toggle="tooltip">
                                                    <i class="ti-check"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">Clark Kent</h6>
                                        <span class="m-b-15 d-block">4 Franelas de Dama Rouxa, 1 Chemise de Caballero Polo. --- BBDD</span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">Abril 14, 2016</span>
                                            <span class="label label-rounded label-info">A enviar</span>
                                            <span class="action-icons">
                                                <a href="javascript:void(0)" title="Revisar" data-toggle="tooltip">
                                                    <i class="ti-pencil-alt"></i>
                                                </a>
                                                <a href="javascript:void(0)" title="Finalzar" data-toggle="tooltip">
                                                    <i class="ti-check"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-row comment-row m-t-0">
                                    <div class="comment-text w-100">
                                        <h6 class="font-medium">Perter Parker</h6>
                                        <span class="m-b-15 d-block">4 Franelas de Dama Rouxa, 1 Chemise de Caballero Polo. --- BBDD</span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right">Abril 14, 2016</span>
                                            <span class="label label-rounded label-primary">Cancelada</span>
                                            <span class="action-icons">
                                                <a href="javascript:void(0)" title="Revisar" data-toggle="tooltip">
                                                    <i class="ti-pencil-alt"></i>
                                                </a>
                                                <a href="javascript:void(0)" title="Finalzar" data-toggle="tooltip">
                                                    <i class="ti-check"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('common/footer.php'); ?>
        </div>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>
</body>
</html>
