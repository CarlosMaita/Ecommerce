 <?php
 if(!isset($_SESSION)){
   session_start();
 }

require_once ('../common/mercadopago.php');
$mp = new MP('1153047962046613', 'i3RGdgCvJXrKT1ceMNOHs4YLNHdgZ9Mj');
if ($_POST){
$_SESSION['nombre-cliente']=str_replace("'","",$_POST['nombre-cliente']);
$_SESSION['type-identidad-cliente']=str_replace("'","",$_POST['type-identidad-cliente']);
$_SESSION['doc-identidad-cliente']=str_replace("'","",$_POST['doc-identidad-cliente']);
$_SESSION['telf-cliente']=str_replace("'","",$_POST['telf-cliente']);
$_SESSION['email-cliente']=str_replace("'","",$_POST['email-cliente']);
$_SESSION['razon-social']=str_replace("'","",$_POST['razon-social']);
$_SESSION['type-identidad']=str_replace("'","",$_POST['type-identidad']);
$_SESSION['doc-identidad']=str_replace("'","",$_POST['doc-identidad']);
$_SESSION['dir-fiscal']=str_replace("'","",$_POST['dir-fiscal']);
//datos de envio
$_SESSION['receptor']=str_replace("'","",$_POST['receptor']);
$_SESSION['type-identidad-receptor']=str_replace("'","",$_POST['type-identidad-receptor']);
$_SESSION['doc-identidad-receptor']=str_replace("'","",$_POST['doc-identidad-receptor']);
$_SESSION['telf-receptor']=str_replace("'","",$_POST['telf-receptor']);
//direccion
$_SESSION['pais']=str_replace("'","",$_POST['pais']);
$_SESSION['estado']=str_replace("'","",$_POST['estado']);
$_SESSION['ciudad']=str_replace("'","",$_POST['ciudad']);
$_SESSION['municipio']=str_replace("'","",$_POST['municipio']);
$_SESSION['parroquia']=str_replace("'","",$_POST['parroquia']);
$_SESSION['direccion']=str_replace("'","",$_POST['direccion']);
$_SESSION['encomienda']=str_replace("'","",$_POST['encomienda']);
$_SESSION['ref']=str_replace("'","",$_POST['ref']);
$_SESSION['codigo-postal']=str_replace("'","",$_POST['codigo-postal']);
$_SESSION['observaciones']=str_replace("'",".",$_POST['observaciones']);
include 'comprar.php';
if (isset($_SESSION['total'])){
    $total=$_SESSION['total'];
  }
//Enviar mail
  /*$cliente_mail=$_SESSION['nombre-cliente'];
  $destino=$_SESSION['email-cliente'];
  $titulo="Compra en Rouxa";
  $contenido = '<html>
  <head>
  <title>Rouxa</title>
  </head>
  <body>
  <h1>Compra en rouxa</h1>
  <p style="color:black">Un saludo cordial '.$cliente_mail.',
  <br>Agradecemos tu compra realizada en nuestra tienda virtual Rouxa, Recuerda que puedes hacerles seguimiento a traves del siguiente ID.
  <br>Que tengas un Feliz Dia.
  </p>
  <h4> IDCOMPRA: '.$Llave.'</h4>
  </body>
  </html>';
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  $headers .= "From: Rouxa <Rouxavzla@gmail.com>" . "\r\n";
  mail($destino, $titulo, $contenido, $headers);
  */
}
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
    <link rel="stylesheet" href="../css/new.css">
    <link href="../admin/assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <title>Rouxa</title>
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
  <body  onload="deshabilitaRetroceso()">
     <div class="container mb-0">
       <div class="row my-4">
         <div class="container text-center">
           <h1 class="display-4" style="font-family: 'Playfair Display', serif;">¡Felicidades por tu Compra!</h1>
         </div>
         <p class="lead px-3">Usted ha realizado la compra de manera existosa. Para continuar, realice el pago total del pedido mediante una transferencia bancaria, o mediante tu saldo disponibe en Mercado Pago.</p>
       </div>
       <br>
       <div class="row mb-4 text-muted">
         <div class="container">
           Con el siguiente codigo (Llave digital), junto con su número de cedula, usted podrá realizar el seguimiento de su compra.
         </div>
       </div>
       <div class="row justify-content-center">
         <div class="p-2 mb-2 col-5 codigo">
           <p class="text-center text-white mt-3"><?PHP
           if($_POST){
             #echo md5($CS); //Cadena del Id completa
             #cadena de $Ncadena caracteres de la cadena
             echo $Llave;
           }else{ echo 'Error: ID No generado'; }
           ?></p>
         </div>
       </div>
       <div class="row justify-content-center">
         <div class="col-auto">
           <small>¿Que es la <a href="../faq/index.php?id=5" target="_blank">Llave digital</a>?</small>
         </div>
       </div>
       <div class="row justify-content-center">
         <div class="container text-muted">
           <small>¡No te preocupes! te enviaremos a tu correo la llave digital, para que luego puedas realizar el seguimiento de tu compra.</small>
         </div>
       </div>
     </div>
      <hr class="my-4">
    <?php
            if (isset($_POST['nombre-cliente'])){
                  $doc=$_SESSION['type-identidad-cliente'].'-'.$_SESSION['doc-identidad-cliente'];
                  $id_mp=md5($Llave.$doc); //id registrado en el inventario
                  $cliente_mp=$_POST['nombre-cliente'];
            }
            if (!empty($total) and isset($_POST['nombre-cliente']) and isset($_POST['email-cliente'])){
            $preference_data = array(
                "items" => array(
                    array(
                        "title" => "Carrito de compras en Rouxa - $cliente_mp",
                        "quantity" => 1,
                        "currency_id" => "VEF", // Available currencies at: https://api.mercadopago.com/currencies
                        "unit_price" =>  $total
                    )
                ),
                "payer" => array(
                    "name"=>$_POST['nombre-cliente'],
                    "email"=>$_POST['email-cliente'],
                                    ),
                 "back_urls"=> array(
                    "success"=> "https://www.rouxa.com.ve/back_MP.php?back=1&id=$id_mp",
                    "pending"=> "https://www.rouxa.com.ve/back_MP.php?back=2&id=$id_mp",
                    "failure"=> "https://www.rouxa.com.ve/back_MP.php?back=3&id=$id_mp"
                ),
                "notification_url"=> "https://www.rouxa.com.ve/receptor/",
                "external_reference"=>"$id_mp"
            );
            $preference = $mp->create_preference($preference_data);
                    ?>
            <div class="continer mb-3">
              <div class="row justify-content-around">
                  <a href="<?php echo $preference['response']['init_point']; ?>" id="boton-mercadopago" class="btn btn-outline-success btn-lg  col-4">Pagar</a>
              </div>
              <div class="row justify-content-around my-2">
                <small>Si desea cancelar la Compra presione: <a href="index.php?reset=" id="boton-mercadopago" class="text-muted">Vaciar Carrito</a></small>
              </div>
            </div>
            <?php
            }
            ?>
            <hr class="my-4">
            <div class="container mt-2">
             <div class="row justify-content-center">
               <a href="../index.php" target="_blank"><img src="../imagen/logo.png" alt="" width="90px"></a>
             </div>
            </div>
    <script src="../admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
