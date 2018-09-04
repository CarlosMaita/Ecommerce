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
   <div class="jumbotron mb-0">
    <h1 class="display-4">¡Hazle seguimiento a tu compra!</h1>
    <p class="lead">Inserta tu <a href="../faq/index.php" target="_blank">llave digital</a> de compra en el campo que se muestra abajo. Y podrás ver el Estatus de tu compra.</p>
    <hr class="my-4">
    <form action="" method="get">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Inserte su Llave digital" aria-label="Inserte su Llave digital" aria-describedby="basic-addon2"  name="idcompra" maxlength="32">
          <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
          </div>
        </div>
        <div class="g-recaptcha" data-sitekey="6LezMGIUAAAAAK7US9I7C9wD2OV9Hufqb8V5whVY"></div>
    </form>
    </div>
    <div class="text-center my-4">
      <h4 class="display-4" style="font-family: 'Playfair Display', serif;">¡Observa otros productos que te podrian interesar!</h4>
    </div>
    <article class="container my-5">
      <div class="card-deck">
        <?php
      $sql = "SELECT * FROM PRODUCTO ORDER BY Rand() LIMIT 4";
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
    <div class="jumbotron mb-0">
      <h1 class="display-4">¡Se un Vendedor Rouxa!</h1>
      <p class="lead">Podrás vender nuestros productos sin tener que realizar alguna inversión.</p>
      <hr class="my-4">
      <p>Solo tendrás que dar tu código de Vendedor Rouxa a tu cliente, y este comprará a tu nombre los articúlos que desee.</p>
      <a class="btn btn-secondary btn-lg disabled mt-3" href="" role="button">Proximamente</a>
    </div>
<div style="min-height:55vh">
 <?php
  if (isset($_GET['g-recaptcha-response']) ){
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
        if($obj->{'success'}){
    if (isset($_GET['idcompra']) ) {
    if($_GET['idcompra']!=NULL){
        $id= $_GET['idcompra'];
        $id=md5($id);
        $sql= "SELECT p.CLIENTE,p.FECHAPEDIDO,p.ESTATUS,c.MONTO FROM PEDIDOS p
        INNER JOIN COMPRAS c
        ON c.idpedido=p.idpedido
        WHERE p.idpedido='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            $row = $result->fetch_assoc();
            $cliente=$row['CLIENTE'];
            $fecha_pedido=$row['FECHAPEDIDO'];
            switch($row['ESTATUS']){
                case '0': $status= 'Por pagar';
                    break;
                case '1': $status='Pago Fallido';
                    break;
                case '2': $status='Pago pendiente';
                    break;
                case '3': $status='Pagado | Buscando en stock';
                    break;
                case '4': $status='Por empaquetar' ;
                    break;
                case '5': $status='Por enviar';
                    break;
                case '6': $status='Enviado';
                    break;
                case '7': $status='Completado';
                    break;
                case '10': $status='Bajo Revisión';
            }
            $monto= $row['MONTO'];
?>
           <div class="container my-4">
            <h1 id="titulo" class=" text-muted">Datos de Compra</h1>
            <p id ="datos"  >Cliente: <?php echo $cliente;?>
            <br>Fecha de pedido: <?php echo $fecha_pedido;?>
            <br>Estatus: <?php echo $status;?>
            <br>Monto Total: <?php echo number_format($monto,2,',','.');?> Bs
            </p>
            <hr class="my-4">
 <?php
             $sql2="SELECT `PRECIO`,`CANTIDAD`, `IDINVENTARIO`  FROM `ITEMS` WHERE `IDPEDIDO`='$id';";
             $result2 = $conn->query($sql2);
             if ($result2->num_rows > 0) {
                 ?>
                   <h2 id="titulo" class="text-muted">Items</h2>
                 <?php
             }
             if ($result2->num_rows > 0) {
                $i=1;
                  while($row = $result2->fetch_assoc()) {
                    $id_inv=$row['IDINVENTARIO'];
                     $sql3="SELECT p.nombre_p FROM `INVENTARIO` i INNER JOIN `PRODUCTO` p ON i.idproducto=p.idproducto WHERE i.idinventario='$id_inv' LIMIT 1";
                    $result3 = $conn->query($sql3);
                       if ($result3->num_rows > 0) {
                              while($row3 = $result3->fetch_assoc()) {
                                  $nombre_p=$row3['nombre_p'];
                              }
                       }
                      ?>
                      <p>Item N° <?php echo $i ?> <br>
                       <?php echo $nombre_p; ?> <br>
                        Precio: <?php  echo number_format($row['PRECIO'],2,',',"."); ?> Bs <br>
                        Cantidad:  <?php   echo $row['CANTIDAD']; ?> Unidad(es) <br>
                        <br>
                     </p>
                    <hr class="my-4">
                      <?php
                      $i++;
                }
             }
             $sql2="SELECT `RAZONSOCIAL`,`RIFCI`, `DIRFISCAL`  FROM `COMPRAS` WHERE `IDPEDIDO`='$id' LIMIT 1;";
             $result2 = $conn->query($sql2);
             if ($result2->num_rows > 0) {
                $row = $result2->fetch_assoc();
                $razon = $row['RAZONSOCIAL'];
                $identidad=$row['RIFCI'];
                $dir_fiscal=$row['DIRFISCAL'];
                if($razon=='NULL' or $identidad=='NULL' or $dir_fiscal=='NULL' ){}else{
                  ?>
            <h1 id="titulo" class="text-muted">Datos de Facturación</h1>
            <p id="datos">
            Razón Social:    <?php echo $razon;?>
            <br>RIF:  <?php echo   $identidad;   ?>
            <br>Direccion Fiscal:  <?php echo  $dir_fiscal; ?>
            </p>
            <hr class="my-4">
            <?php
                 }
             }
             $sql= "SELECT * FROM ENVIOS e WHERE e.idpedido='$id' LIMIT 1";
             $result3 = $conn->query($sql);
             if ($result3->num_rows > 0) {
                 $row3 = $result3->fetch_assoc();
                ?>
             <h1 id="titulo" class="text-muted">Datos de Envio</h1>
                <p id="datos" >
                <br>Receptor:     <?php echo $row3['RECEPTOR'] ;?>
                <br>CI o RIF:      <?php echo $row3['CIRECEPTOR'] ;?>
                <br>Telefono:      <?php echo $row3['TELFRECEPTOR'] ;?>
                <br>Direccion :  <?php echo $row3['PAIS'] ;?>,      <?php echo $row3['ESTADO'] ;?>,      <?php echo $row3['CIUDAD'] ;?>,      <?php echo $row3['MUNICIPIO'] ;?>      <?php echo $row3['PARROQUIA'] ;?> <?php echo $row3['DIRECCION'] ;?>
                <br>Codigo postal:      <?php echo $row3['CODIGOPOSTAL'] ;?>
                <br>Observaciones:      <?php echo $row3['OBSERVACIONES'] ;?>
                <br>N° de guia: <?php
                    if($row3['GUIA']!=NULL){
                        echo $row3['GUIA'];
                    }else{
                        echo '-';
                    }
                ?>
               </p>
              <hr class="my-4">
<?php
              }
         ?>
     </div>
             <?php
        }
        else{
            ?>
               <div class="container my-3">
                <div class="alert alert-danger" role="alert">
                 La llave digital de compra ingresada No exite. Por favor, verifique.
                </div>
                </div>
                 <?php
                }
                }
    }
        }
        else{
         ?>
            <div class="container my-3">
                <div class="alert alert-warning" role="alert">
                Para hacerle seguimiento a tu compra debes confirmar de que no eres un robot.
                </div>
            </div>
     <?php
    }
            }
    $conn->close();
?>
</div>
<!--Fin  de codigo. !-->
<?php include_once '../common/footer2.php';?>
    <script src="../admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
