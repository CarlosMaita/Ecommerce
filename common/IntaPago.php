<?php
$code='000';

//Datos
$keyId= "2147A23C-17A8-49F8-A796-19AC52AF55F9";
$publickeyId= "7910c28a89d1e6968b80a5f806990541";
$descripcion='Carrito de Compras - '.$code;
$nombreCard;
$cedulaCard;
$numeroCard;
$cvcCard;
$venceCard;
$estatusId='2'; // pagar sin autorizacion previa.
$ipCliente;

$url = 'https://api.instapago.com/payment';
$fields = array("KeyID" => $keyId  , "PublicKeyId" => $publickeyId, "Amount" => "1","Description" => $descripcion,"CardHolder"=> " ","CardHolderId"=> " ", "CardNumber" => " ", "CVC" => " ",
"ExpirationDate" => " ", "StatusId" => "", "Address" => " ", "City" => " ", "ZipCode" => "
", "State" => " " );
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url );
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($fields));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec ($ch);
curl_close ($ch);
echo $server_output ;
?>
