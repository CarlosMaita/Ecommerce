<?php
include_once('../common/sesion2.php');
if($_SESSION['nivel']==4 || $_SESSION['nivel']==1){
}else{ header('Location: ../principal.php'); }
require('../../common/conexion.php');
    if(isset($_GET['id'], $_GET['guia']) and $_GET['guia']!=NULL){
        $newid=$_GET['id'] ;
        $guia=$_GET['guia'];
        $sql="UPDATE `ENVIOS` SET `GUIA`='$guia' WHERE `IDPEDIDO`='$newid'";
        if ($conn->query($sql) === TRUE) {
                        $sql2="UPDATE `PEDIDOS` SET `ESTATUS`='6' WHERE  `IDPEDIDO`='$newid'";
                        if ($conn->query($sql2) === TRUE) {
                        } else { echo "Error: " . $sql2. "<br>" . $conn->error; }
        } else { echo "Error: " . $sql. "<br>" . $conn->error; }
         header ('location: Envios.php');
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
   <link href="../../css/new.css" rel="stylesheet">
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
    <!-- onload="deshabilitaRetroceso()"-->
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
                          <?php
                        $sql="SELECT `IDPEDIDO` FROM `PEDIDOS` WHERE `ESTATUS`=5 ORDER BY FECHAPEDIDO ASC";
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
                                                      <th class="border-top-0">Pedido</th>
                                                      <th class="border-top-0">Estatus</th>
                                                      <th class="border-top-0">Fecha</th>
                                                      <th class="border-top-0" title="Dirección de Envío" data-toggle="tooltip">Dirección</th>
                                                      <th class="border-top-0" title="Total del Paquete" data-toggle="tooltip">Peso(gr)</th>
                                                      <th>Número de Guia</th>
                                                      <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php
                                                    while($row = $result->fetch_assoc()){
                                                      $id=$row['IDPEDIDO'];
                                                      $sql2="SELECT *  FROM PEDIDOS p
                                                      INNER JOIN ENVIOS e ON e.IDPEDIDO=p.IDPEDIDO
                                                      INNER JOIN COMPRAS c ON c.IDPEDIDO=p.IDPEDIDO
                                                      WHERE p.IDPEDIDO='$id' and ESTATUS=5"; //encuentro los articulos del pedido
                                                      $result2 = $conn->query($sql2);
                                                      if ($result2->num_rows > 0){
                                                        while($row2 = $result2->fetch_assoc()){
                                                          #GET VALUES
                                                          $estatus=$row2['ESTATUS'];
                                                          $fecha=$row2['FECHAPEDIDO'];
                                                          #cliente
                                                          $cliente=$row2['CLIENTE'];
                                                           #Direccion
                                                           $pais=$row2['PAIS'];
                                                           $estado=$row2['ESTADO'];
                                                           $ciudad=$row2['CIUDAD'];
                                                           $municipio=$row2['MUNICIPIO'];
                                                           $parroquia=$row2['PARROQUIA'];
                                                           $direccion=$row2['DIRECCION'];
                                                           $codigopostal=$row2['CODIGOPOSTAL'];
                                                           $encomienda=$row2['ENCOMIENDA'];
                                                           $observaciones=$row2['OBSERVACIONES'];
                                                           #receptor
                                                           $receptor=$row2['RECEPTOR'];
                                                           $ci_receptor=$row2['CIRECEPTOR'];
                                                           $telf_receptor=$row2['TELFRECEPTOR'];
                                                           #Factura
                                                           $isfactura=false;
                                                           if(!empty($row2['RAZONSOCIAL']) and !empty($row2['RIFCI']) and !empty($row2['DIRFISCAL'])){
                                                             $isfactura=true;
                                                             $razon_social=$row2['RAZONSOCIAL'];
                                                             $rif=$row2['RIFCI'];
                                                             $dir_fiscal=$row2['DIRFISCAL'];
                                                           }

                                                           #Peso
                                                           $sql8="SELECT i.PESO as PESO, it.CANTIDAD as CANTIDAD FROM ITEMS it
                                                           INNER JOIN INVENTARIO i ON i.IDINVENTARIO=it.IDINVENTARIO
                                                           WHERE it.IDPEDIDO='$id'";
                                                           $res12= $conn->query($sql8);
                                                           if ($res12->num_rows > 0){
                                                             $peso=0;
                                                             while($row9 = $res12->fetch_assoc()){
                                                                $peso=$peso+$row9['PESO']*$row9['CANTIDAD'];
                                                             }
                                                           }
                                                        ?>
                                                    <tr>
                                                        <td class="txt-oflo"> <small><?php echo $id;?></small></td>
                                                        <td><span class="label label-warning label-rounded">Por Enviar</span></td>
                                                        <td class="txt-oflo"><?=$fecha?></td>
                                                        <td><span class="font-medium"><button type="button" class="enlace2 ml-auto" href="javascript:void(0)" data-toggle="modal" data-target="#ver<?php echo $id;?>">Ver dirección</button></span></td>
                                                        <td><?=number_format($peso,2,',','.')?></td>
                                                        <form action="Envios.php" method="get">
                                                          <input type="text" value="<?php echo $id;?>" name="id" style="display: none">
                                                          <td>
                                                            <input class="form-control" type="text" placeholder="Código de Seguimiento" id="guia" name="guia">
                                                          </td>
                                                          <td>
                                                            <button type="submit" id="Enviado" class="btn btn-outline-success btn-sm" onclick="return confirma()">Enviado</button>
                                                        </form>
                                                          <a onclick="ven()" id="bad" class="btn btn-outline-danger btn-sm" href="javascript:void(0)" data-toggle="modal" data-target="#fal<?php echo $id;?>"><span title="Reportar Inconveniente" data-toggle="tooltip">Falla</span></a></td>
                                                        </td>
                                                    </tr>
                                                    <div class="modal fade bd-example-modal-lg" id="ver<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="closeSesionLabel">A Enviar por <?=$encomienda?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                                        <b>Compra de <?=$cliente?></b>
                                                                      </div>
                                                                      <div class="col-auto ml-auto">
                                                                        <b>12/5/2018</b>
                                                                      </div>
                                                                      <div class="col-12">
                                                                        <div class="row">
                                                                          <div class="col-6">
                                                                            <small class="d-block">Enviar a: <span class="text-muted"><?=$receptor?></span></small>
                                                                            <small class="d-block">Teléfono: <span class="text-muted"><?=$telf_receptor?></span></small>
                                                                            <small class="d-block">País: <span class="text-muted"><?=$pais?></span></small>
                                                                            <small class="d-block">Municipio: <span class="text-muted"><?=$municipio?></span></small>
                                                                            <small class="d-block">Código Postal: <span class="text-muted"><?=$codigopostal?></span></small>
                                                                          </div>
                                                                          <div class="col-6">
                                                                            <small class="d-block">Cedula: <span class="text-muted"><?=$ci_receptor?></span></small>
                                                                            <small class="d-block">Estado: <span class="text-muted"><?=$estado?></span></small>
                                                                            <small class="d-block">Parroquia: <span class="text-muted"><?=$parroquia?></span></small>
                                                                            <small class="d-block">Dirección: <span class="text-muted"><?=$direccion?></span></small>
                                                                          </div>
                                                                          <div class="col-12 mt-2">
                                                                            <small class="d-block">Observaciones: <span class="text-muted"><?php if(!empty($observaciones)){ echo $observaciones;}else{ echo 'Sin observaciones';} ?></span></small>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            <?php if($isfactura==true){
                                                              ?>
                                                              <hr>
                                                              <div class="co-12">
                                                                <b>Factura Fiscal:</b>
                                                                <small class="d-block">Razon Social: <span class="text-muted"><?=$razon_social?></span></small>
                                                                <small class="d-block">Rif: <span class="text-muted"><?=$rif?></span></small>
                                                                <small class="d-block">Direccion Fiscal: <span class="text-muted"><?=$dir_fiscal?></span></small>
                                                              </div>
                                                              <?php
                                                            } ?>
                                                            </div>
                                                            <hr>
                                                            <h2 class="text-center">Peso: <?=number_format($peso,2,',','.')?> gr</h2>
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
                                                  <?php  }
                                                   ?>
                                                </tbody>
                                              <?php
                                            } }?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php
                        } else{
                          ?>
                            <div class="row my-3 text-danger justify-content-center">
                              <h5>¡No hay pedidos para Enviar!</h5>
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
