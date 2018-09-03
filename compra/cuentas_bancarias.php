 <?php
 if(!isset($_SESSION)){
   session_start();
 }
  ?>
 <?php
require_once ('common/mercadopago.php');

$mp = new MP('1153047962046613', 'i3RGdgCvJXrKT1ceMNOHs4YLNHdgZ9Mj');

if ($_POST){
$_SESSION['nombre-cliente']=str_replace("'","",$_POST['nombre-cliente']);
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
$_SESSION['ref']=str_replace("'","",$_POST['ref']);
$_SESSION['codigo-postal']=str_replace("'","",$_POST['codigo-postal']);
$_SESSION['observaciones']=str_replace("'",".",$_POST['observaciones']);

include 'comprar.php';
 if (isset($_SESSION['total'])){
    $total=$_SESSION['total'];
  }
//Enviar mail
$cliente_mail=$_SESSION['nombre-cliente'];
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
<h4> IDCOMPRA: '. md5($CS).'</h4>
</body>
</html>';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: Rouxa <Rouxavzla@gmail.com>" . "\r\n";

    mail($destino, $titulo, $contenido, $headers);
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
    <meta name="application-name" content="Tienda Virtual de Ropa, Rouxa." />
     <link rel="stylesheet" href="css/style-main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
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
<!-- Inicio de codigo. !-->
     <div class="jumbotron mb-0">
      <h1 class="display-4">¡Felicidades por tu Compra! </h1>
      <p class="lead">Usted ha realizado la compra de manera existosa. Para continuar, realice el pago total del carrito de compras a traves de la plataforma de cobranza Mercado pago. <br><br> Su llave digital es la siguiente:</p>
        <div class="p-3 mb-2 bg-info text-white">
           <p class="text-center mt-3"><?PHP
                 if($_POST){
                     echo md5($CS);
                 }else{
                     echo 'Error: ID No generado';
                 }
                 ?></p>
      </div>
    <small>¡Importante!, El seguimiento de su pedido lo podrá realizar con la llave digital entregada, asegurese de guardar la llave en un lugar que pueda recordar. Ademas, le hemos enviado a su correo la llave digital de compra.</small>
      <hr class="my-4">
    <?php
            if (!empty($CS) and isset($_POST['nombre-cliente'])){
                  $id_mp=md5($CS);
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
          <center>
                  <a href="<?php echo $preference['response']['init_point']; ?>" id="boton-mercadopago" class="boton-exp" style="background:#0ff022; border:none;" >Ir pagar</a>
              </center>
              <center>
                  <p>OR</p>
              </center>
               <center>
                  <a href="index.php?reset=" id="boton-mercadopago" class="boton-exp" style="background:#e00e0e;  border:none;"  >Vaciar carrito</a>
              </center>
         </div>
            <?php
            }
            ?>
<?php include_once '../common/footer2.php'; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
