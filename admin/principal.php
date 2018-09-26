<?php
  include('common/sesion.php');
  include('../common/conexion.php');
  $email=$_SESSION['USUARIO'];
  $sql="SELECT NIVEL FROM USUARIOS WHERE CORREO='$email'";
  $result_nivel = $conn->query($sql);
  if($row=$result_nivel->fetch_assoc()){
    $_SESSION['nivel']=$row['NIVEL'];
  }
 ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página administrativa de Rouxa">
    <meta name="author" content="Eutuxia Web">
    <link rel="icon" type="image/jpg" sizes="16x16" href="../imagen/favicon.jpg">
    <title>Rouxa Administración</title>
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
                                <h4 class="card-title">Página Administrativa de la Empresa Rouxa, C.A.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include('common/footer.php'); ?>
        </div>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/custom.min.js"></script>
</body>
</html>
