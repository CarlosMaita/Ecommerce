<?php
  include_once('../common/sesion2.php');
  require('../../common/conexion.php');
    if(isset($_GET['orden'], $_GET['id']) ){
        $newid=$_GET['id'];
        if ($_GET['orden']=='good'){
        $sql="UPDATE `PEDIDOS` SET `ESTATUS`='4' WHERE  `IDPEDIDO`='$newid'";
                        if ($conn->query($sql) === TRUE) {
                        } else { echo "Error: " . $sql. "<br>" . $conn->error; }
        }
        else if ($_GET['orden']=='bad'){
            if (isset($_GET['comentario'])){
                $comentario=$_GET['comentario'];
            }
           $sql="UPDATE `PEDIDOS` SET `ESTATUS`='10' WHERE  `IDPEDIDO`='$newid'";
            if ($conn->query($sql) === TRUE) {
            } else { echo "Error: " . $sql. "<br>" . $conn->error; }
            $sql="INSERT INTO `FALLA`(`IDPEDIDO`, `COMENTARIO`, `FECHAFALLA`) VALUES ('$newid','$comentario', CURRENT_DATE())";
             if ($conn->query($sql) === TRUE) {
            } else { echo "Error: " . $sql. "<br>" . $conn->error; }
        }
         header ('location:buscador_pedido.php');
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
      <link href="../../css/new.css" rel="stylesheet">
      <link href="../dist/css/style.min.css" rel="stylesheet">
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
      <link rel="stylesheet" href="../css/Stile.css">
    </head>
    <script>
        function deshabilitaRetroceso(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="no-back-button";}
            }
         var band=false;
         function ven(){
             if(!band){
                 band=!band;
                 document.getElementById('falla-comentario').style.display='block';
             }else{
                 band=!band;
                  document.getElementById('falla-comentario').style.display='none';
                  document.getElementById('comentario').value='';
             }
         }
         function confirma(){
             r=confirm("¿Esta usted seguro?");
             return r;
         }
    </script>
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
                                    <li class="breadcrumb-item">
                                        <a href="index.php">Despacho</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Buscador Pedido</li>
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
                        $sql="SELECT `IDPEDIDO` FROM `PEDIDOS` WHERE `ESTATUS`=3";
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
                                                <th class="border-top-0">Fecha de Compra</th>
                                                <th class="border-top-0">Articulos</th>
                                                <th></th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php
                                              while($row = $result->fetch_assoc()){
                                                $id=$row['IDPEDIDO'];
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
                                                  <td><span class="label label-purple label-rounded">Por Buscar</span></td>
                                                  <td class="txt-oflo"><?=date('d/m, Y') ?></td>
                                                  <td><span class="font-medium"><button type="button" class="enlace2 ml-auto" href="javascript:void(0)" data-toggle="modal" data-target="#ver<?php echo $id;?>">Ver artículos</button></span></td>
                                                  <td><a id="good" class="btn btn-outline-success btn-sm" href="buscador_pedido.php?orden=good&id=<?php echo $id;?>" onclick="return confirma()">Listo</a>
                                                  <a onclick="ven()" id="bad" class="btn btn-outline-danger btn-sm" href="javascript:void(0)" data-toggle="modal" data-target="#fal<?php echo $id;?>">Falla</a></td>
                                              </tr>
                                              <div class="modal fade bd-example-modal-lg" id="ver<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                                          <div class="col-10">
                                                            <div class="container-fluid">
                                                              <div class="row">
                                                                <div class="col-auto">
                                                                  <b>Frenela Nike xxxxxx</b>
                                                                </div>
                                                                <div class="col-12">
                                                                  <div class="row">
                                                                    <div class="col-6">
                                                                      <small class="d-block">CANTIDAD: <span class="text-muted">12</span></small>
                                                                      <small class="d-block">TALLA: <span class="text-muted">M</span></small>
                                                                      <small class="d-block">COLOR(es): <span class="text-muted">Azul/Negro</span></small>
                                                                      <small class="d-block">MANGA: <span class="text-muted">Corta</span></small>
                                                                    </div>
                                                                    <div class="col-6">
                                                                      <small class="d-block">MARCA: <span class="text-muted">Polo</span></small>
                                                                      <small class="d-block">MATERIAL: <span class="text-muted">Algodón</span></small>
                                                                      <small class="d-block">CUELLO: <span class="text-muted">Redondo</span></small>
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
                                              <div class="modal fade" id="fal<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title">¿Desea reportar una falla o inconveniente?</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                      </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <div class="container-fluid">
                                                        <div class="row">
                                                          <div class="col-12">
                                                            <form action="buscador_pedido.php" method="get">
                                                            <input type="hidden" value="bad" name="orden">
                                                            <input type="hidden" value="<?php echo $id;?>">
                                                            <textarea rows="4" cols="50" name="comentario" id="comentario" placeholder="Detalle la falla con un comentario"></textarea>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                      <input type="submit" onclick="return confirma()" id="boton-enviar" class="btn btn-primary" value="Enviar">
                                                    </form>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
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
