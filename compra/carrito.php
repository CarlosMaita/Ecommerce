<?php
    session_start();
    include '../common/conexion.php';
include_once '../common/TasaUSD2.php';
if (isset($_SESSION['carrito'])){
    $band =false;
    if(isset($_POST['cantidad'])){
        $cantidad=$_POST['cantidad'];
        $band =true;
    }
    if(isset($_POST['id'])){
    $arreglo=$_SESSION['carrito'];
    $encontro=FALSE;
    $numero=0;
    if(!$band){
        $cantidad=1;
    }
    for($i=0;$i<count($arreglo);$i++){
        if($arreglo[$i]['Id']==$_POST['id']){
            if($arreglo[$i]['Talla']==$_POST['talla']){
            $encontro =TRUE;
            $numero=$i;
            }
        }
    }
    if($encontro==true){
        $arreglo[$numero]['Cantidad']= $arreglo[$numero]['Cantidad']+$cantidad;
        $_SESSION['carrito']=$arreglo;
    }else{
        $nombre ="";
        $precio=0;
        $imagen="";
        $sql= 'select * from PRODUCTO where IDPRODUCTO='.$_POST['id'];
        $res = $conn->query($sql);
        while($f = $res->fetch_assoc()){
                $nombre=$f["NOMBRE_P"];
                $precio=$f["PRECIO"]*$tasa_usd;
                $imagen=$f["IMAGEN"];
            }
        $newarreglo=array('Id'=>$_POST["id"],'Nombre'=>$nombre, 'Precio'=>$precio, 'Imagen'=> $imagen, 'Cantidad'=>$cantidad, 'Talla'=>$_POST['talla']);
        array_push($arreglo,$newarreglo);
        $_SESSION['carrito']=$arreglo;
    }
    }
}else {
    $band=false;
    if (isset($_POST["cantidad"])){
        $cantidad=$_POST["cantidad"];
        $band=true;
      }
    if (isset($_POST["id"])){
        $nombre ="";
        $precio=0;
        $imagen="";
        if(!$band){
            $cantidad=1;
        }
        $sql= 'select * from PRODUCTO where IDPRODUCTO='.$_POST["id"];
        $res = $conn->query($sql);
        while($f = $res->fetch_assoc()){
                $nombre=$f["NOMBRE_P"];
                $precio=$f["PRECIO"]*$tasa_usd;
                $imagen=$f["IMAGEN"];
            }
        $arreglo[]=array('Id'=>$_POST["id"],'Nombre'=>$nombre, 'Precio'=>$precio, 'Imagen'=> $imagen, 'Cantidad'=>$cantidad, 'Talla'=>$_POST['talla']);
        $_SESSION['carrito']=$arreglo;
    }
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
    <link rel="stylesheet" href="../css/style-main.css">
    <link rel="stylesheet" href="../css/new.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <title>Rouxa-Carrrito de Compras</title>
  </head>
  <body>
  <?php include_once '../common/menu2.php';
        include_once '../common/2domenu2.php';
        //<div  style="min-height: 100vh; width:auto" class="mt-3">
  ?>
   <?php
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
     <ul class="grupo-botones">
        <li class="expand">
          <form action="datos_compra.php">
            <input class="boton-exp" type="submit" value="Comprar">
          </form>
        </li>
        <li class="expand">
            <form action="../vitrina/index.php">
              <input  class="boton-exp" type="submit" value="Añadir otro producto">
            </form>
        </li>
        <li class="expand">
              <form action="../index.php">
                <input type="hidden" name="reset" value="">
                <input class="boton-exp" type="submit" value="Limpiar carrito">
               </form>
        </li>
      </ul>
   <?php
            }else{
?>
            <div class="container mt-3">
              <div class="row">
                <div class="col-12 breadcrumb text-dark">
                  Realiza todas tus compras de manera segura, pagando via Mercado Pago.
                </div>
              </div>
            </div>
            <div class="container">
              <div class="row justify-content-between">
                <div class="col-7">
                  <div class="breadcrumb text-muted">
                    No tienes productos en el carrrito.
                  </div>
                  <div class="text-secondary text-center">
                    <p><small>Con la compra de mas de 100$ en productos, el envio te sale gratis.</small></p>
                  </div>
                  <hr>
                </div>
                <div class="col-4 bg-dark">
                  <div class="container">
                    <div class="row my-3">
                      <h5 class="text-white">Resumen</h5>
                    </div>
                    <hr class="hr">
                    <div class="row text-white my-2 justify-content-between">
                      <p class="col-6"><b>SubTotal:</b></p>
                      <p class="col-auto"><b>0,00$</b></p>
                    </div>
                    <div class="row text-white mt-2 justify-content-between">
                      <p class="col-6"><b>Costos de Envio:</b></p>
                      <p class="col-auto mb-0"><b>0,00$</b></p>
                      <p class="col-12 text-white-50"><small>Estos costos se basan en las agencias de encomiendas con las que trabajamos. <a href="../faq/index.php?id=2">Ver más.</a> </small> </p>
                    </div>
                    <hr class="hr">
                    <div class="row text-white my-2 justify-content-between">
                      <p class="col-6"><b>Total:</b></p>
                      <p class="col-auto"><b>0,00$</b></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center my-5">
              <a class="btn btn-outline-dark" href="../index.php">Seguir comprando</a>
            </div>
<?php
            }
            //</div>
    ?>
<!--Fin  de codigo. !-->
    <div class="jumbotron mb-0" >
      <h1 class="display-4">¡Se un Vendedor Rouxa!</h1>
      <p class="lead">Podrás vender nuestros productos sin tener que realizar alguna inversión.</p>
      <hr class="my-4">
      <p>Solo tendrás que dar tu código de Vendedor Rouxa a tu cliente, y este comprará a tu nombre los articúlos que desee.</p>
      <a class="btn btn-secondary btn-lg disabled mt-3" href="" role="button">Proximamente</a>
    </div>
<?php include_once '../common/footer2.php';?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>
