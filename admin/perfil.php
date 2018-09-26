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
                        <h4 class="page-title">Perfil</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="principal.php">Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Perfil</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="../../assets/images/users/5.jpg" class="rounded-circle" width="150" />
                                    <h4 class="card-title m-t-10">Alexis Montilla</h4>
                                    <?php
                                    switch($_SESSION['nivel']){
                                        case '1':
                                              $status="Administrador";
                                              $descrip="<p>Usted posee permisos para operar sobre todos los departamentos del sistema.</p>";
                                            break;
                                        case '2':
                                              $status="Supervisor";
                                              $descrip="<p>Usted posee permisos para operar sobre todos los departamentos del sistema.</p>";
                                            break;
                                        case '3':
                                              $status="Vendedor";
                                              $descrip="<p>Usted posee permisos para operar sobre el departamento de Ventas, y esta encargado de operar y solucionar las fallas</p>";
                                            break;
                                        case '4':
                                              $status="Despachador";
                                              $descrip="<p>Usted posee permisos para operar sobre el departamento de Despacho.</p>";
                                            break;
                                        case '5':
                                              $status="Visitante";
                                              $descrip="<p>Usted posee permisos solo para visualizar el sistema.</p>";
                                            break;
                                        case '6':
                                              $status="Desarrollador";
                                              $descrip="<p>Usted posee permisos para operar sobre el departamento de desarrollo.</p>";
                                            break;
                                        case '7':
                                              $status="Almacenista";
                                              $descrip="<p>Usted posee permisos para operar sobre el empaquetado del departamento de despacho.</p>";
                                            break;
                                    } ?>
                                    <h6 class="card-subtitle"><?php echo $status;?></h6>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> <small class="text-muted">Email </small>
                                <h6>hannagover@gmail.com</h6>
                                <small class="text-muted">Dirección de la Empresa</small>
                                <h6>Valencia, Venezuela</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material">
                                    <div class="form-group">
                                        <label class="col-md-12">Nombre</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="Alexis Montilla" class="form-control form-control-line" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" placeholder="alexisamm9261@gmail.com" class="form-control form-control-line" name="example-email" id="example-email" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Permisos</label>
                                        <div class="col-md-12">
                                          <?php echo $descrip; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <a class="btn btn-success" href="javascript:void(0)" data-toggle="modal" data-target="#pass">Cambiar mi Clave</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="closeSesionLabel">Cambiar Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="" action="perfil.html" method="post">
                      <div class="form-group">
                        <label for="example-email" class="col-md-12">Nueva Password</label>
                        <div class="col-md-12">
                          <input type="password" class="form-control form-control-line" name="pass">
                        </div>
                      </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Actualizar</a>
                  </form>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <?php include('common/footer.php'); ?>
        </div>
    </div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/custom.min.js"></script>
</body>
</html>
