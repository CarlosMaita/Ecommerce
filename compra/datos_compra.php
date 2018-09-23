<?php
    session_start();
    $_SESSION['factura']=false;
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
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <title>Rouxa</title>
      </head>
    <script  type="text/javascript">
function Factura(){
                   // Get the checkbox
          var checkBox = document.getElementById("isfacture");
          // Get the output text
          var text1 = document.getElementById("doc-identidad");
          var text2 =  document.getElementById("type-identidad");
          var text3 =  document.getElementById("dir-fiscal");
          var text4 =  document.getElementById("razon-social");
          // If the checkbox is checked, display the output text
          if (checkBox.checked == true){
            text1.style.display = "block";
            text2.style.display = "block";
            text3.style.display = "block";
            text4.style.display = "block";
          } else {
            text1.style.display = "none";
            text2.style.display = "none";
            text3.style.display = "none";
            text4.style.display = "none";
          }
    }
</script>
  <body>
    <?php include_once '../common/menu2.php';
          include_once '../common/2domenu2.php';
    ?>
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-6">
        <h2 class="display-4" style="font-family: 'Playfair Display', serif;">Solicitud de Compra</h2>
      </div>
      <div class="col-4">
        <a href="../index.php" target="_blank"><img src="../imagen/logo.png" alt="" width="400px" height="auto"></a>
      </div>
    </div>
    <div class="row">
      <p class="lead text-muted">Ingresa los siguientes datos para poder realizar el envío de tus productos. Ten en cuenta que algún dato incorrecto generará problemas para enviar
        los productos al lugar y persona correcta.</p>
    </div>
  </div>
  <hr class="mb-4">
   <?php
       if(isset($_SESSION['carrito'])){
              ?>
    <form action="cuentas_bancarias.php" method="POST" onsubmit="return validacion() && captch()">
    <div class="container">
      <div class="row justify-content-center">
        <h3 class="ml-5 pl-5">Datos del Cliente</h3>
        <button type="button" class="enlace2 ml-auto" href="javascript:void(0)" data-toggle="modal" data-target="#ver">Ver productos seleccionados</button>
      </div>
      <div class="row my-3">
        <div class="input-group mb-2 col-6">
          <input type="text" placeholder="Nombre de cliente" name="nombre-cliente" class="form-control" required>
        </div>
        <div class="input-group mb-2 col-6">
          <select name="type-identidad-cliente" style="border: 1px solid #ddd; width:20%; border-radius: 4px 0 0 4px;">
            <option value="V">V</option>
            <option value="E">E</option>
            <option value="P">Pasaporte</option>
          </select>
          <input type="text" placeholder="Documento de identidad del cliente [Ej: 20184765]" name="doc-identidad-cliente" maxlength="30" class="form-control" required>
        </div>
        <div class="input-group mb-2 col-6">
          <input type="text" placeholder="Número telefonico del Cliente" name="telf-cliente" class="form-control" required>
        </div>
        <div class="input-group mb-2 col-6">
          <input type="email" placeholder="E-mail" name="email-cliente" class="form-control" required>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mb-2">
          <h3 class="ml-5 pl-5">Datos necesarios para el Envío</h3>
        </div>
        <div class="input-group mb-2 col-6">
          <input type="text" placeholder="Nombre y apellido del que recibe" name="receptor" class="form-control">
        </div>
        <div class="input-group mb-2 col-6">
          <select name="type-identidad-receptor" style="border: 1px solid #ddd; width:20%; border-radius: 4px 0 0 4px;">
            <option value="V">V</option>
            <option value="E">E</option>
            <option value="P">Passaporte</option>
          </select>
          <input type="text" placeholder="Documento de identidad del que recibe [Ej: 20184765]" name="doc-identidad-receptor" maxlength="30" class="form-control" required>
        </div>
        <div class="input-group mb-2 col-6">
          <input type="text" placeholder="Telefono del que recibe. [Ej: 04149990000]" name="telf-receptor" class="form-control" required>
        </div>
        <div class="input-group mb-2 col-6">
          <div class="input-group-prepend">
            <label class="input-group-text" for="pais">Pais</label>
          </div>
          <select name="pais" class="custom-select" required>
            <option value="Venezuela">Venezuela</option>
            <option value="Colombia">Colombia</option>
            <option value="Panama">Panamá</option>
          </select>
        </div>
        <div class="input-group mb-2 col-6">
          <input type="text" placeholder="Estado | Departamento | Provincia" name="estado" maxlength="30" class="form-control" required>
        </div>
        <div class="input-group mb-2 col-6">
          <input type="text" placeholder="Ciudad" name="ciudad" maxlength="30" class="form-control" required>
        </div>
        <div class="input-group mb-2 col-6">
          <input type="text" placeholder="Municipio | Localidad" name="municipio" maxlength="30" class="form-control" required>
        </div>
        <div class="input-group mb-2 col-6">
          <input type="text" placeholder="Parroquia" name="parroquia" maxlength="30" class="form-control">
        </div>
        <div class="input-group mb-2 col-6">
          <input type="text" placeholder="Direccion -  Barrio | Zona | Sector | Casa | Apartamento | local | Edificio" name="direccion" maxlength="200" class="form-control" >
        </div>
        <div class="input-group mb-2 col-6">
          <input type="text" placeholder="Referencia" name="ref" maxlength="200" class="form-control">
        </div>
        <div class="input-group mb-2 col-6">
          <input type="text" placeholder="Código Postal" name="codigo-postal" maxlength="20" class="form-control">
        </div>
        <div class="input-group mb-2 col-6">
          <div class="input-group-prepend">
            <label class="input-group-text" for="pais">Agencia de Encomienda</label>
          </div>
          <select name="encomienda" class="custom-select" required>
            <option value="Domesa">Domesa</option>
            <option value="MRW">MRW</option>
            <option value="Tealca">Tealca</option>
            <option value="Zoom">Zoom</option>
          </select>
        </div>
        <div class="input-group mb-2 col-12">
          <input type="text" placeholder="Observaciones de envío" name="observaciones" maxlength="200" class="form-control">
        </div>
      </div>
      <div class="row justify-content-center">
        <p><input id="isfacture" type="checkbox" onclick="Factura()" name="isfacture" value="true"> Yo, deseo factura fiscal</p>
      </div>
      <div class="row breadcrumb">
        <div class="input-group mb-2 col-6">
          <input type="text" placeholder="Razon Social" name="razon-social" id="razon-social" style="display: none" class="form-control">
        </div>
        <div class="input-group mb-2 col-6">
          <select class="text-center" name="type-identidad" id="type-identidad" style="display: none; border: 1px solid #ddd; width:20%; border-radius: 4px 0 0 4px;">
            <option>J</option>
            <option>P</option>
            <option>G</option>
          </select>
          <input type="text" placeholder="Registro Único de Información Fiscal  (RIF)" name="doc-identidad" id="doc-identidad" maxlength="30" style="display: none"  class="form-control">
        </div>
        <div class="input-group mb-2 col-12">
          <input type="text" placeholder="Direccion Fiscal" name="dir-fiscal" id="dir-fiscal" style="display: none" class="form-control">
        </div>
      </div>
      <div class="row my-3">
        <p><input type="checkbox" required> Yo, declaro haber leido y entendido los <a href="../info/terminos.php" target="_blank">términos, condiciones y politicas</a> que regulan esta tienda virtual. De igual manera declaro que la informacion suministrada mediante este fomulario es correcta.</p>
      </div>
      <div class="row my-4 justify-content-center">
        <div class="col-2">
          <button class="btn btn-outline-success" type="submit" name="">Confirmar</button>
        </div>
        <div class="col-2">
          <a class="btn btn-outline-danger" name="" href="../index.php">Cancelar</a>
        </div>
      </div>
    </div>
    </form>
  <div class="modal fade bd-example-modal-lg" id="ver" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="closeSesionLabel">¡Estos son los productos que seleccionaste!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
                 <?php
                 $datos=$_SESSION['carrito'];
                 $total=0;
                 $pesot=0;
                 for($i=0;$i<count($datos);$i++){
                     ?>
            <div class="row">
              <div class="col-2 text-center">
                <img class="img-fluid" src="../imagen/<?php echo $datos[$i]['Imagen']; ?>" width="70px" height="70px">
              </div>
              <div class="col-8">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-auto">
                      <b><?php echo $datos[$i]['Nombre'];?></b>
                    </div>
                    <div class="col-12">
                      <div class="row">
                        <div class="col-8">
                          <small class="d-block">TALLA: <span class="text-muted"><?php echo $datos[$i]['Talla']?></span></small>
                          <small class="d-block">CANTIDAD: <span class="text-muted"><?php echo $datos[$i]['Cantidad'];?></span></small>
                        </div>
                        <div class="col-4">
                          <small><?php echo number_format($datos[$i]['Precio'],2,',','.');?> BsS</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <?php
            #monto total
            $total=($datos[$i]['Cantidad']*$datos[$i]['Precio'] ) + $total;
            #peso Total
            $pesot=($datos[$i]['Cantidad']*$datos[$i]['Peso']) + $pesot;
              }
              #total
              $subtotal=$total;
              $iva=$subtotal*0.16;
              $total=$subtotal+$iva;
              $_SESSION['total']=$total;
              #peso Total
              $_SESSION['peso']=$pesot;

            ?>
          </div>
            <h5 class="text-center text-muted">Subtotal: <?=number_format($subtotal,2,',','.') ?> BsS</h5>
            <h6 class="text-center">IVA(16%): <?=number_format($iva,2,',','.')?> BsS</h6>
          <hr>
          <h2 class="text-center">Total: <?=number_format($total,2,',','.')?> BsS</h2>
        </div>
      </div>
    </div>
  </div>
<?php }else{ ?>
  <div class="container">
    <div class="row justify-content-center py-5">
      <h2 class="text-danger">No hay productos añadidos en el carrito</h2>
    </div>
    <div class="row justify-content-center my-5">
        <a href="../index.php" class="btn btn-outline-success col-4">Volver</a>
    </div>
  </div>
  <?php } ?>
<?php include_once '../common/footer2.php';?>
    <script>
  function captch(){
    var response = grecaptcha.getResponse();
    if(response.length == 0){
      alert("Captcha no verificado")
      return false;
    }else{ return true; }
  }
</script>
<script src="../admin/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
