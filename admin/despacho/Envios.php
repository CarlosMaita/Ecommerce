<?php
include_once('../common/sesion2.php');
require('../../common/conexion.php');
    if(isset($_GET['id']) and isset($_GET['guia']) and $_GET['guia']!=NULL){
        $newid=$_GET['id'] ;
        $guia=$_GET['guia'];
        $sql="UPDATE `ENVIOS` SET `GUIA`='$guia' WHERE `IDPEDIDO`='$newid'";
        if ($conn->query($sql) === TRUE) {
                        $sql2="UPDATE `PEDIDOS` SET `ESTATUS`='6' WHERE  `IDPEDIDO`='$newid'";
                        if ($conn->query($sql2) === TRUE) {
                        } else { echo "Error: " . $sql2. "<br>" . $conn->error; }
        } else { echo "Error: " . $sql. "<br>" . $conn->error; }
         header ('location:Envios.php');
    }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <html>
  <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="Administración de la E-Comerce Rouxa.">
   <meta name="author" content="Eutuxia Web, C.A.">
   <link rel="icon" type="image/jpg" sizes="16x16" href="../../imagen/favicon.jpg">
   <title>Rouxa - Administración</title>
   <link href="../dist/css/style.min.css" rel="stylesheet">
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
  </head>
    <script>
        function deshabilitaRetroceso(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="no-back-button";}
            }
         function confirma(){
             r=confirm("¿Esta usted seguro?");
             return r;
         }
    </script>
    <body onload="deshabilitaRetroceso()">
      <?php
      $sql="SELECT `IDPEDIDO` FROM `pedidos` WHERE `ESTATUS`='5'";
      $result = $conn->query($sql);
       ?>
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
                        <h4 class="page-title">Despacho</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center justify-content-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="../principal.php">Inicio</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Despacho</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Envíos</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
                  <div class="container-fluid">
                    <div class="row justify-content-around mb-3">
                        <div class="col-4 text-center">
                          <a class="btn btn-link text-success" href="buscador_pedido.php">Busqueda de Pedidos</a>
                        </div>
                        <div class="col-4 text-center">
                          <a class="btn btn-link text-success" href="empaquetado.php">Empaquetado</a>
                        </div>
                        <div class="col-4 text-center">
                          <a class="btn btn-link text-success" href="envios.php">Envíos</a>
                        </div>
                    </div>
                    <?php if($result->num_rows == 0){
                      ?>
                    <div class="row my-3 text-danger justify-content-center">
                      <h5>¡No hay pedidos para enviar!</h5>
                    </div>
                        <?php
                      }else{
                      ?>
                      <div class="row">
                          <div class="col-12">
                              <div class="card">
                                  <div class="table-responsive">
                                      <table class="table table-hover">
                                          <thead>
                                              <tr>
                                                <th class="border-top-0">ID</th>
                                                <th class="border-top-0">Cliente</th>
                                                <th class="border-top-0">Estatus</th>
                                                <th class="border-top-0">Fecha</th>
                                                <th class="border-top-0">Articulos</th>
                                                <th class="border-top-0">Total</th>
                                                <th></th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                          <?php
                                            if($result->num_rows > 0){
                                                 while($row = $result->fetch_assoc()){
                                                     $id=$row['IDPEDIDO'];
                                                   ?>
                                              <tr>
                                                <td><?php echo $id;?></td>
                                                <td class="txt-oflo">Pablo Marmol</td>
                                                <td><span class="label label-success label-rounded">A Enviar</span> </td>
                                                <td class="txt-oflo">Enero 18, 2018</td>
                                                <td><span class="font-medium">Franelas Dama, Chemise Caballero</span></td>
                                                <td><span class="font-medium">$24</span></td>
                                                <td><form action="Envios.php" method="get">
                                                     <input type="text" value="<?php echo $id;?>" name="id" style="display: none">
                                                     <input  type="text" placeholder="Numero de Guia" id="guia" name="guia">
                                                   <center>
                                                       <input type="submit" id="Enviado" value="Pedido Enviado" onclick="return confirma()">
                                                   </center>
                                                </form></td>
                                              </tr>
                                            <?php }
                                            } ?>
                                          </tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <?php
                }
                $conn->close();
                include('../common/footer.php'); ?>
          </div>
      </div>
    </body>
</html>
