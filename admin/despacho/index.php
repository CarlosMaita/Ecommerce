<?php
include_once('../common/sesion2.php');
if($_SESSION['nivel']==4 || $_SESSION['nivel']==1){
}else{ header('Location: ../principal.php'); }
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
                      <h4 class="page-title">Despacho</h4>
                  </div>
                  <div class="col-7 align-self-center">
                      <div class="d-flex align-items-center justify-content-end">
                          <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item">
                                      <a href="../principal.php">Inicio</a>
                                  </li>
                                  <li class="breadcrumb-item active" aria-current="page">Despacho</li>
                              </ol>
                          </nav>
                      </div>
                  </div>
              </div>
          </div>
                <div class="container-fluid">
                  <div class="row justify-content-around mb-3">
                      <div class="col-3 text-center">
                        <a class="btn btn-link text-success" href="buscador_pedido.php">Busqueda de Pedidos</a>
                      </div>
                      <div class="col-3 text-center">
                        <a class="btn btn-link text-success" href="empaquetado.php">Empaquetado</a>
                      </div>
                      <div class="col-3 text-center">
                        <a class="btn btn-link text-success" href="envios.php">Envíos</a>
                      </div>
                      <div class="col-3 text-center">
                        <a class="btn btn-link text-danger" href="fallas.php">Fallas</a>
                      </div>
                  </div>
                  <?php
                      $sql="SELECT IDPEDIDO, ESTATUS FROM `PEDIDOS` WHERE `ESTATUS`>2 and `ESTATUS`<6" ;
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0){
                    ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                              <th class="border-top-0">IDPedido</th>
                                              <th class="border-top-0">Estatus</th>
                                              <th class="border-top-0">Fecha</th>
                                              <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            while($row = $result->fetch_assoc()){
                                              $id=$row['IDPEDIDO'];
                                              $estatus=$row['ESTATUS'];
                                          ?>
                                          <?php
                                          $sql2="SELECT `IDINVENTARIO`, `CANTIDAD` FROM `ITEMS` WHERE `IDPEDIDO`='$id'";//encuentro los articulos del pedido
                                          $result2 = $conn->query($sql2);
                                              if ($result2->num_rows > 0){
                                                while($row2 = $result2->fetch_assoc()){
                                                  $idinventario=$row2['IDINVENTARIO'];
                                                  $cantidad=$row2['CANTIDAD'];
                                                  $sql3="SELECT p.NOMBRE_P, i.TALLA FROM `INVENTARIO` i
                                                  INNER JOIN MODELOS m ON m.IDMODELO=i.IDMODELO
                                                  INNER JOIN PRODUCTOS p ON p.IDPRODUCTO=m.IDPRODUCTO
                                                  WHERE i.IDINVENTARIO='$idinventario' LIMIT 1";
                                                  $result3 = $conn->query($sql3);
                                                  if ($result3->num_rows > 0){
                                                    while($row3 = $result3->fetch_assoc()){
                                                      $nombre=$row3['NOMBRE_P'];
                                                      $talla=$row3['TALLA'];
                                                    }
                                                  }
                                                       ?>
                                                       <tr>
                                                           <td class="txt-oflo"> <small><?php echo $id;?></small> </td>
                                                           <td>
                                                             <?php
                                                                  switch ($estatus) {
                                                                    case '3':
                                                                      echo '<span class="label label-purple label-rounded">Por Buscar</span>';
                                                                      break;
                                                                      case '4':
                                                                        echo '<span class="label label-info label-rounded">Por Empaquetar</span>';
                                                                        break;
                                                                      case '5':
                                                                          echo '<span class="label label-warning label-rounded">Por Enviar</span>';
                                                                          break;
                                                                    default:
                                                                      // code...
                                                                      break;
                                                                  }
                                                              ?>
                                                           </td>
                                                           <td class="txt-oflo"><?=date('d/m, Y') ?></td>
                                                       </tr>
                                                       <?php
                                                       }
                                                           }
                                                           ?>
                                        </tbody>
                                            <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }else{
                    ?>
                      <div class="row my-3 text-danger justify-content-center">
                        <h5>¡No hay pedidos para sacar!</h5>
                      </div>
                </div>
        </div>
        <?php
          }
            $conn->close();
            include('../common/footer.php'); ?>
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
