<?php
    include('../common/conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Rouxa - Administración</title>
  <link rel="icon" type="image/jpg" sizes="16x16" href="../imagen/favicon.jpg">
  <link href="assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
  <?php
      // put your code here
  if(isset($_POST['correo'])){
      if($_POST['correo']!=null && $_POST['clave']!=null){
      $user=$_POST['correo'];
      $clave=$_POST['clave'];
       $sql="select * from USUARIOS where CORREO='$user'";
       $res=$conn->query($sql);
       if($row=$res->fetch_assoc()) {//usuario registrado
           $clave=md5($clave);
           if($clave==$row['CLAVE']){//usuario loggeado
             session_start();
             $_SESSION['ACCESO']=TRUE;
             $_SESSION['USUARIO']=$_POST['correo'];
             header ('Location:principal.php');
           }else{//contraseña incorrecta
                echo  '<div class="container">
                 <p>Contraseña incorrecta</p>
                </div>';
               session_destroy();
           }
       }else{//No existe Usuario registrado con este correo
        echo  '<div class="container">
              <p>Usuario no Registrado</p>
          </div>';
        session_destroy();
       }
      }
  }
      ?>
  <div class="container">
    <div class="text-center">
      <h1 class="text-white display-4">Rouxa - Administración</h1>
    </div>
    <div class="row">
    <div class="card card-login mx-auto mt-5 col-md-6 col-sm-10">
      <div class="card-header">Iniciar sesión</div>
      <div class="card-body">
        <form action="index.php" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Correo</label>
            <input class="form-control" id="exampleInputEmail1" name="correo" type="text" aria-describedby="emailHelp" placeholder="Coloque el correo">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" name="clave" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
              <input class="form-check-input" type="checkbox">Recordar Password</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Iniciar</button>
        </form>
        <div class="text-center mt-3">
          <a class="d-block small" href="forgot-password.html">Olvido el Password?</a>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
