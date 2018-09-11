<?php
  include_once('../common/sesion2.php');
  require('../../common/conexion.php');
    if(isset($_GET['orden']) and isset($_GET['id']) ){
        $newid=$_GET['id'];
        if ($_GET['orden']=='good'){
        $sql="UPDATE `PEDIDOS` SET `ESTATUS`='5' WHERE  `IDPEDIDO`='$newid'";
                        if ($conn->query($sql) === TRUE) {
                        }else{ echo "Error: " . $sql. "<br>" . $conn->error; }
        }
        else if ($_GET['orden']=='bad'){
            if (isset($_GET['comentario'])){
                $comentario=$_GET['comentario'];
            }
           $sql="UPDATE `PEDIDOS` SET `ESTATUS`='10' WHERE  `IDPEDIDO`='$newid'";
            if ($conn->query($sql) === TRUE){
            }else{ echo "Error: " . $sql. "<br>" . $conn->error; }
            $sql="INSERT INTO `FALLA`(`IDPEDIDO`, `COMENTARIO`, `FECHAFALLA`) VALUES ('$newid','$comentario', CURRENT_DATE())";
             if ($conn->query($sql) === TRUE){
            }else{ echo "Error: " . $sql. "<br>" . $conn->error; }
        }
         header ('location:Empaquetado.php');
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
    <body onload="deshabilitaRetroceso()">
      <?php
      $sql="SELECT `IDPEDIDO` FROM `PEDIDOS` WHERE `ESTATUS`='4'";
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
                                    <li class="breadcrumb-item active" aria-current="page">Empaquetado</li>
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
                          <a class="btn btn-link text-success" href="envios.php">Envios</a>
                        </div>
                    </div>
                    <?php if($result->num_rows == 0){
                      ?>
                    <div class="row my-3 text-danger justify-content-center">
                      <h5>¡No hay pedidos para empaquetar!</h5>
                    </div>
                        <?php
                      }else{
                      ?>
                      <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="table-responsive">
                              <table class="table table-hover">
                                <?php
                                 if($result->num_rows > 0){
                                  while($row = $result->fetch_assoc()){
                                    $id=$row['IDPEDIDO'];
                                ?>
                                  <thead>
                                    <tr>
                                      <th class="border-top-0">Id</th>
                                      <th class="border-top-0">Cliente</th>
                                      <th class="border-top-0">Estatus</th>
                                      <th class="border-top-0">Fecha</th>
                                      <th class="border-top-0">Articulos</th>
                                      <th class="border-top-0">Talla</th>
                                      <th class="border-top-0">Cantidad</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php
                                   $sql2="SELECT `IDINVENTARIO`, `CANTIDAD` FROM `ITEMS` WHERE `IDPEDIDO`='$id'";
                                   $result2 = $conn->query($sql2);
                                   if($result2->num_rows > 0){
                                     while($row2 = $result2->fetch_assoc()){
                                       $idinventario=$row2['IDINVENTARIO'];
                                       $cantidad=$row2['CANTIDAD'];
                                       $sql3="SELECT p.NOMBRE_P, i.TALLA FROM `INVENTARIO` i INNER JOIN `PRODUCTO` p ON i.idproducto=p.idproducto WHERE i.idinventario='$idinventario' LIMIT 1";
                                       $result3 = $conn->query($sql3);
                                       if($result3->num_rows > 0){
                                         while($row3 = $result3->fetch_assoc()){
                                           $nombre=$row3['NOMBRE_P'];
                                           $talla=$row3['TALLA'];
                                         }
                                       } ?>
                                    <tr>
                                      <td><?php echo $id;?></td>
                                      <td class="txt-oflo"><?php echo $nombre;?></td>
                                      <td><span class="label label-info label-rounded">Empaquetado</span></td>
                                      <td class="txt-oflo">Abril 19, 2018</td>
                                      <td><span class="font-medium">Franelas Dama, Chemise Caballero</span></td>
                                      <td><span class="font-medium"><?php echo $talla;?></span></td>
                                      <td><span class="font-medium"><?php echo $cantidad;?></span></td>
                                      <td><a href="empaquetado.php?orden=good&id=<?php echo $id;?>" id="good" onclick="return confirma()">LISTO</a>
                                        <a onclick="ven()" id="bad">Reportar Falla</a></td>
                                    </tr>
                                    <div id="falla-comentario" style="display:none">
                                      <form action="Empaquetado.php" method="get">
                                        <input type="text" value="bad" name="orden" style="display: none"/>
                                        <input type="text" value="<?php echo $id;?>" name="id" style="display: none"/>
                                        <input type="text" name="comentario" id="comentario" maxlength="200" placeholder="Detalle la falla con un comentario"/>
                                        <input type="submit" value="Enviar" id="boton-enviar" onclick="return confirma()"/>
                                      </form>
                                    </div>
                                  </tbody>
                                <?php }
                                  } ?>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
        <?php     }
                }
              }
          $conn->close();
          include('../common/footer.php');?>
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
