<?php
    session_start();
    $_SESSION['factura']=false;
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
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
<script src='https://www.google.com/recaptcha/api.js'></script>
    <title>Rouxa-Carrrito de Compras</title>
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
<!-- Inicio de codigo. !-->
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h2 class="display-4">Solicitud de Compra</h2>
    <p class="lead">Usted ha realizado la solicitud del siguiente carrito de compra. Por favor, verifique, complete los campos de datos solicitados  y confirme su compra.</p>
  </div>
  <div style="min-height: 10vh; width:auto">
   <?php
        // put your code here
       if(isset($_SESSION['carrito'])){
              ?>
      <table class="table" style="font-size:0.9em;">
      <thead class="thead-dark ">
        <tr>
          <th scope="col">Producto</th>
          <th scope="col">Talla</th>
          <th scope="col">Precio[Bs]</th>
          <th scope="col">Cantidad</th>
        </tr>
      </thead>
           <?php
           $datos=$_SESSION['carrito'];
           $total=0;
           for($i=0;$i<count($datos);$i++){
               ?>
      <tbody>
        <tr>
          <td><?php echo $datos[$i]['Nombre'];?></td>
          <td><?php echo $datos[$i]['Talla']?></td>
          <td><?php echo number_format($datos[$i]['Precio'],2,',','.');?></td>
          <td><?php echo $datos[$i]['Cantidad'];?></td>
        </tr>
         <?php
          $total=$datos[$i]['Cantidad']*$datos[$i]['Precio'] + $total;
           }
              ?>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
    <table  class="table">
      <tbody>
         <tr>
          <th scope="row">Total</th>
          <td><?php echo number_format($total,2,',','.');?> [Bs]</td>
        </tr>
      </tbody>
    </table>
   <?php
           $_SESSION['total']=$total;
            ?>
</div>
  </div>
    <form action="cuentas_bancarias.php" method="POST" onsubmit="return validacion() && captch()">
    <div class="container">
      <div class="row justify-content-center">
        <h3 class="text-center">Datos del Cliente</h3>
      </div>
      <div class="row my-3">
        <div class="input-group col-4">
          <input type="text" placeholder="Nombre de cliente" name="nombre-cliente" class="form-control" required>
        </div>
        <div class="input-group col-4">
          <input type="text" placeholder="Número telefonico del Cliente" name="telf-cliente" class="form-control" required>
        </div>
        <div class="input-group col-4">
          <input type="email" placeholder="E-mail del Cliente" name="email-cliente" class="form-control" required>
        </div>
      </div>
      <div class="row">
        <div class="col-12 mb-2">
          <h3 class="text-center">Datos necesarios para el Envío</h3>
        </div>
        <div class="input-group mb-2 col-4">
          <input type="text" placeholder="Nombre y apellido del que recibe" name="receptor" class="form-control">
        </div>
        <div class="input-group mb-2 col-4">
          <select name="type-identidad-receptor" style="border: 1px solid #ddd; width:20%; border-radius: 4px 0 0 4px;">
            <option>V</option>
            <option>E</option>
            <option>Passaporte</option>
          </select>
          <input type="text" placeholder="Documento de identidad del que recibe [ejemplo: 20184765]" name="doc-identidad-receptor" maxlength="30" class="form-control" required>
        </div>
        <div class="input-group mb-2 col-4">
          <input type="text" placeholder="Telefono del que recibe. Ej: 04149990000" name="telf-receptor" class="form-control" required>
        </div>
        <div class="input-group mb-2 col-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="pais">Pais</label>
          </div>
          <select name="pais" class="custom-select" required>
            <option value="Venezuela">Venezuela</option>
            <option value="Colombia">Colombia</option>
            <option value="Panama">Panamá</option>
          </select>
        </div>
        <div class="input-group mb-2 col-4">
          <input type="text" placeholder="Estado | Departamento | Provincia" name="estado" maxlength="30" class="form-control" required>
        </div>
        <div class="input-group mb-2 col-2">
          <input type="text" placeholder="Ciudad" name="ciudad" maxlength="30" class="form-control" required>
        </div>
        <div class="input-group mb-2 col-3">
          <input type="text" placeholder="Municipio | Localidad" name="municipio" maxlength="30" class="form-control" required>
        </div>
        <div class="input-group mb-2 col-3">
          <input type="text" placeholder="Parroquia" name="parroquia" maxlength="30" class="form-control">
        </div>
        <div class="input-group mb-2 col-6">
          <input type="text" placeholder="Direccion -  Barrio | Zona | Sector | Casa | Apartamento | local | Edificio" name="direccion" maxlength="200" class="form-control" >
        </div>
        <div class="input-group mb-2 col-3">
          <input type="text" placeholder="Código Postal" name="codigo-postal" maxlength="20" class="form-control">
        </div>
        <div class="input-group mb-2 col-5">
          <input type="text" placeholder="Referencia" name="ref" maxlength="200" class="form-control">
        </div>
        <div class="input-group mb-2 col-3">
          <select name="type-identidad-receptor" class="form-control">
            <option value="domesa">Domesa</option>
            <option value="zoom">Zoom</option>
            <option value="mrw">MRW</option>
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
        <p><input type="checkbox" required> Yo, declaro haber leido y entendido los <a href="../faq/index.php">términos, condiciones y politicas</a> que regulan esta tienda virtual. De igual manera declaro que la informacion suministrada mediante este fomulario es correcta.</p>
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
  function captch() {
    var response = grecaptcha.getResponse();
    if(response.length == 0){
      alert("Captcha no verificado")
      return false;
    } else {
      return true;
    }
  }
</script>
<script src="../admin/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
