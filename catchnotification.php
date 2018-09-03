<?php
//require '../Meli/meli.php';//El archivo del SDK de ML en php
//require 'configApp.php';
//require 'conexion.php';//conecto con la base de datos
//require 'meli.php';


/* Your Application Id */
$appId = '1153047962046613';

/* Your Secret Key */
$secretKey = 'i3RGdgCvJXrKT1ceMNOHs4YLNHdgZ9Mj';

/* The Redirect url */
$redirectURI = 'http://localhost/oxasapp/administracion/common/redirect.php';

/* The site id of the country where your application will work.
If you don't know your site_id go to our sites resources: https://api.mercadolibre.com/sites  */
$siteId = 'MLV';


$data = json_decode(file_get_contents('php://input'), true);//Con esto atrapas la informacion que te envia ML
$resource = $data['resource']; //Aqui creas tu variable que contiene el resource

$token='APP_USR-1153047962046613-071618-613460f5a2b4b7d613e2919b08654d03-305745002';
/*$ml_session = new Meli($appId, $secretKey, $token); //Crea la sesion de ML
$params = array('access_token' => $token);
$order_data = $ml_session->get($resource, $params);//Haces un GET a la API para obtener los datos de la pregunta*/


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php echo "$resource"; ?>
  </body>
</html>
