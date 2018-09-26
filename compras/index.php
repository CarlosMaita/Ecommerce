<?php
 require_once '../common/conexion.php';
 include '../common/TasaUSD2.php';
  ?>
 <!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="desciption" content="Rouxa, Tienda virtual de Ropa para Damas, Caballeros y Niños.">
    <meta name="keywords" content="Rouxa, Ropa, Damas, Caballeros, Zapatos, Tienda Virtual">
    <meta name="author" content="Eutuxia, C.A.">
    <meta name="application-name" content="Tienda Virtual de Ropa, Rouxa."/>
    <link rel="icon" type="image/jpg" sizes="16x16" href="../imagen/favicon.jpg">
    <link rel="stylesheet" href="../css/style-main.css">
    <link rel="stylesheet" href="../css/new.css">
    <link href="../admin/assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <title>Rouxa</title>
  </head>
  <body>
    <?php include_once '../common/menu2.php';
          include_once '../common/2domenu2.php';
    ?>
   <div class="container mt-4">
    <h1 style="font-family: 'Playfair Display', serif;">¡Hazle seguimiento a tu compra!</h1>
    <p class="lead">Inserta tu <a href="../faq/index.php?id=5" target="_blank">llave digital</a> de compra en el campo que se muestra abajo. Y podrás ver el Estatus de tu compra.</p>
    <hr class="my-4">
  </div>
    <div class="container">
      <form action="" method="get">
      <div class="row my-3">
          <div class="input-group col-6">
            <select name="type-identidad-cliente" style="border: 1px solid #ddd; width:20%; border-radius: 4px 0 0 4px;">
              <option value="V" selected>V</option>
              <option value="E">E</option>
              <option value="P">Passaporte</option>
            </select>
            <input type="text" placeholder="Documento de identidad del cliente [Ej: 20184765]" name="doc-identidad-cliente" maxlength="30" class="form-control" required>
          </div>
          <div class="input-group col-6">
            <input type="text" class="form-control" placeholder="Inserte su Llave digital" aria-label="Inserte su Llave digital" aria-describedby="basic-addon2"  name="idcompra" maxlength="32"/>
          </div>
          <!--  <div class="g-recaptcha col" data-sitekey="6LezMGIUAAAAAK7US9I7C9wD2OV9Hufqb8V5whVY"></div>
        -->
        <input type="hidden" name="g-recaptcha-response">
        <div class="input-group-append mt-3 col-12 justify-content-center">
          <button type="submit" class="btn btn-outline-secondary">Buscar</button>
        </div>
      </form>
      </div>
    </div>
<div style="min-height:55vh">
 <?php
 /* if (isset($_GET['g-recaptcha-response'],$_GET['idcompra'], $_GET['type-identidad-cliente'], $_GET['doc-identidad-cliente'])){
        $recaptcha=$_GET['g-recaptcha-response'];
        $secret= '6LezMGIUAAAAAA9I8Uc0LjESqea6WETT5DG5RcUc';
        # Our new data
        $data = array(
            'secret' => $secret,
            'response' => $recaptcha
        );
        # Create a connection
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $ch = curl_init($url);
        # Form data string
        $postString = http_build_query($data, '', '&');
        # Setting our options
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        # Get the response
        $response = curl_exec($ch);
        curl_close($ch);
        $obj = json_decode($response);
        if($obj->{'success'}){ */
          if (isset($_GET['idcompra'],$_GET['type-identidad-cliente'],$_GET['doc-identidad-cliente'] )) {
            if($_GET['idcompra']!=NULL){
              $id= $_GET['idcompra'];
              $docid=$_GET['type-identidad-cliente'].'-'.$_GET['doc-identidad-cliente'];
              $id=md5($id.$docid);
              $sql= "SELECT p.CLIENTE,p.FECHAPEDIDO,p.ESTATUS,c.MONTO FROM PEDIDOS p
              INNER JOIN COMPRAS c
              ON c.idpedido=p.idpedido
              WHERE p.idpedido='$id'";
              $result = $conn->query($sql);
              if($result->num_rows > 0){
                  // output data of each row
                  $row = $result->fetch_assoc();
                  $cliente=$row['CLIENTE'];
                  $fecha_pedido=$row['FECHAPEDIDO'];
                  switch($row['ESTATUS']){
                      case '0': $status= 'Aún no has pagado este pedido.'; $id_s=0;
                          break;
                      case '1': $status='El pago que realizaste fue fallido'; $id_s=1;
                          break;
                      case '2': $status='El pago que realizaste aún no se ha hecho efectivo'; $id_s=2;
                          break;
                      case '3': $status='En las próximas horas estaremos enviando tu pedido'; $id_s=3;
                          break;
                      case '4': $status='Estamos preparando tu paquete para enviarlo'; $id_s=4;
                          break;
                      case '5': $status='Tu paquete esta pronto a ser enviado'; $id_s=5;
                          break;
                      case '6': $status='¡Tu pedido ya fue Enviado! Consulta con la oficina de encominedas'; $id_s=6;
                          break;
                      case '7': $status='Completado'; $id_s=7;
                          break;
                      case '10': $status='Tu pedido se encuentra bajo revisión. Nos estaremos comunicando contigo para solventar el inconveniente.'; $id_s=10;
                  }
                  $monto= $row['MONTO'];
                      ?>
                      <div class="container">
                        <div class="row my-4">
                          <div class="col-auto">
                            <h2><b>Compra realizada por <?php echo $cliente;?></b></h2>
                          </div>
                          <div class="col-auto ml-auto">
                            <h4><b class="text-muted" title="Fecha de compra" data-toggle="tooltip"><?php echo $fecha_pedido;?></b></h4>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-1 offset-sm-4">
                            <a class="btn btn-outline-success btn-sm" href="javascript:void(0)" data-toggle="modal" data-target="#articulos">Ver Productos comprados</a>
                          </div>
                          <div class="col-1 offset-sm-2">
                            <a class="btn btn-outline-success btn-sm" href="javascript:void(0)" data-toggle="modal" data-target="#ver">Ver Estatus de la compra</a>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade bd-example-modal-lg" id="articulos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="closeSesionLabel">¡Estos son los productos que compraste!</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="container-fluid">
                                <div class="row">
                                  <div class="col-2 text-center">
                                    <img class="img-fluid" src="../imagen/" width="70px" height="70px">
                                  </div>
                                  <div class="col-8">
                                    <div class="container-fluid">
                                    <?php
                                    $sql2="SELECT `PRECIO`,`CANTIDAD`, `IDINVENTARIO`  FROM `ITEMS` WHERE `IDPEDIDO`='$id';";
                                    $result2 = $conn->query($sql2);
                                    if($result2->num_rows > 0){
                                      $i=1;
                                      while($row = $result2->fetch_assoc()){
                                        $id_inv=$row['IDINVENTARIO'];
                                        $sql3="SELECT p.NOMBRE_P FROM INVENTARIO i
                                        INNER JOIN MODELOS m ON m.IDMODELO=i.IDMODELO
                                        INNER JOIN PRODUCTOS p ON p.IDPRODUCTO=m.IDPRODUCTO
                                        WHERE i.IDINVENTARIO='$id_inv' LIMIT 1";
                                        $result3 = $conn->query($sql3);
                                        if($result3->num_rows > 0){
                                          while($row3 = $result3->fetch_assoc()) {
                                            $nombre_p=$row3['NOMBRE_P'];
                                          }
                                        }
                                        ?>
                                          <div class="row">
                                            <div class="col-auto">
                                              <b><?php echo $nombre_p;?></b>
                                            </div>
                                            <div class="col-12">
                                              <div class="row">
                                                <div class="col-8">
                                                  <small class="d-block">TALLA: <span class="text-muted"></span></small>
                                                  <small class="d-block">CANTIDAD: <span class="text-muted"><?php echo $row['CANTIDAD'];?></span></small>
                                                </div>
                                                <div class="col-4">
                                                  <small><?php echo number_format($row['PRECIO'],2,',','.');?> Bs.S</small>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        <?php
                                        $i++;
                                      }
                                    }
                                    ?>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <hr>
                                    <h2 class="text-center">Total: <?php echo number_format($monto,2,',','.');?> BsS</h2>
                                  </div>
                                </div>
                              </div>
                            </div>
                      <div class="modal fade bd-example-modal-lg" id="ver" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="closeSesionLabel">A Enviar por Domesa</h5>
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
                                        <?php
                                        $sql= "SELECT * FROM ENVIOS e WHERE e.idpedido='$id' LIMIT 1";
                                        $result3 = $conn->query($sql);
                                        if($result3->num_rows > 0){
                                          $row3 = $result3->fetch_assoc();
                                          ?>
                                        <div class="col-12 mt-2">
                                          <div class="row">
                                            <div class="col-6">
                                              <small class="d-block">Enviar a: <span class="text-muted"><?php echo $row3['RECEPTOR'];?></span></small>
                                              <small class="d-block">Teléfono: <span class="text-muted"><?php echo $row3['TELFRECEPTOR'];?></span></small>
                                              <small class="d-block">País: <span class="text-muted"><?php echo $row3['PAIS'];?></span></small>
                                              <small class="d-block">Municipio: <span class="text-muted"><?php echo $row3['MUNICIPIO'];?></span></small>
                                              <small class="d-block">Dirección: <span class="text-muted"><?php echo $row3['DIRECCION'];?></span></small>
                                            </div>
                                            <div class="col-6">
                                              <small class="d-block">Cedula: <span class="text-muted"><?php echo $row3['CIRECEPTOR'];?></span></small>
                                              <small class="d-block">Estado: <span class="text-muted"><?php echo $row3['ESTADO'];?></span></small>
                                              <small class="d-block">Ciudad: <span class="text-muted"><?php echo $row3['CIUDAD'];?></span></small>
                                              <small class="d-block">Parroquia: <span class="text-muted"><?php echo $row3['PARROQUIA'];?></span></small>
                                              <small class="d-block">Código Postal: <span class="text-muted"><?php echo $row3['CODIGOPOSTAL'];?></span></small>
                                            </div>
                                            <div class="col-12">
                                              <small class="d-block">Observaciones: <span class="text-muted"><?php echo $row3['OBSERVACIONES'];?></span></small>
                                            </div>
                                          </div>
                                        </div>
                                        <?php } ?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <hr>
                                <?php
                                $sql2="SELECT `RAZONSOCIAL`,`RIFCI`, `DIRFISCAL`  FROM `COMPRAS` WHERE `IDPEDIDO`='$id' LIMIT 1;";
                                $result2 = $conn->query($sql2);
                                if($result2->num_rows > 0){
                                  $row = $result2->fetch_assoc();
                                  $razon = $row['RAZONSOCIAL'];
                                  $identidad=$row['RIFCI'];
                                  $dir_fiscal=$row['DIRFISCAL'];
                                  if($razon=='NULL' or $identidad=='NULL' or $dir_fiscal=='NULL'){}else{
                                ?>
                                <div class="co-12">
                                  <b>Factura Fiscal:</b>
                                  <small class="d-block">Razon Social: <span class="text-muted"><?php echo $razon;?></span></small>
                                  <small class="d-block">Rif: <span class="text-muted"><?php echo $identidad;?></span></small>
                                  <small class="d-block">Direccion Fiscal: <span class="text-muted"><?php echo $dir_fiscal;?></span></small>
                                </div>
                                <hr/>
                                <?php
                                  }
                                }
                                 ?>
                               </div>
                              <h2 class="text-center"><?php
                              if($row3['GUIA']!=NULL){
                                echo $row3['GUIA'];
                              }else{ echo '-'; }
                              ?></h2>
                              <div class="d-block text-center status-<?php echo $id_s;?>">
                                <?php echo $status;?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                   <?php }else{ ?>
                    <div class="container my-3">
                      <div class="alert alert-danger" role="alert">
                        La llave digital de compra ingresada No exite. Por favor, verifique.
                      </div>
                    </div>
                       <?php
                      }
                      }
  //                  }
          }else{
         ?>
            <div class="container my-3">
                <div class="alert alert-warning" role="alert">
                Para hacerle seguimiento a tu compra debes confirmar de que no eres un robot.
                </div>
            </div>
     <?php
    }
//  }
?>
<!--
</div>
<div class="text-center  my-4">
  <h4 class="display-4" style="font-family: 'Playfair Display', serif;">¡Observa otros productos que te podrian interesar!</h4>
</div>
<article class="container my-5">
  <div class="card-deck">
    <?php
  $sql = "SELECT * FROM PRODUCTOS ORDER BY Rand() LIMIT 4";
  $result = $conn->query($sql);
  if ($result->num_rows > 0){
     while($row = $result->fetch_assoc()){
        ?>
    <div class="card" style="max-width: 100%; height: auto;">
      <a href="../compra/index.php?id=<?php echo $row['IDPRODUCTO']; ?>"><img class="vitrina card-img-top img-fluid" src="../imagen/<?php echo $row['IMAGEN']; ?>" alt="<?php echo $row['NOMBRE_P']; ?>"></a>
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['NOMBRE_P']; ?></h5>
        <p class="card-text">Excelente para un paseo por la ciudad, el parque o el centro comercial. 100% Algodón.</p>
        <p class="card-text"><small class="text-muted">Precio: <?php echo number_format($row['PRECIO']*$tasa_usd, 2, ',', '.'); ?>  Bs.</small></p>
      </div>
    </div>
     <?php
         }
     }else{
         echo " <p>Aun no existen productos en Vitrina</p>";
     }?>
  </div>
</article>
-->
<?php include_once '../common/footer2.php';?>
    <script src="../admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php $conn->close(); ?>
