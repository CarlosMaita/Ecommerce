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
        $sql= 'select * from PRODUCTOS where IDPRODUCTO='.$_POST['id'];
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
        $sql= 'SELECT * from PRODUCTOS where IDPRODUCTO='.$_POST["id"];
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
    <link href="../admin/assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <title>Rouxa-Carrrito de Compras</title>
  </head>
  <body>
  <?php include_once '../common/menu2.php';
        include_once '../common/2domenu2.php';
        //<div  style="min-height: 100vh; width:auto" class="mt-3">
      </thead>
        if(isset($_SESSION['carrito'])){
              ?>
              <div class="container mt-3">
                <div class="row">
                  <div class="col-12 breadcrumb text-muted">
                    Realiza todas tus compras de manera segura, pagando via Mercado Pago.
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row justify-content-between">
                  <div class="col-7 mt-2">
                    <div class="row justify-content-between bg-light py-2">
                      <div class="col-auto">
                        <h5 id="title"></h5>
                      </div>
                        <div class="col-auto">
                          <a href="../vitrina/index.php">Seguir Comprando</a>
                        </div>
                    </div>
                    <?php
                    $datos=$_SESSION['carrito'];
                    $total=0;
                    $cantidad_total=0;
                    for($i=0;$i<count($datos);$i++){
                        $total_modelo=$datos[$i]['Cantidad']*$datos[$i]['Precio'];
                        $cantidad_total+=$datos[$i]['Cantidad'];
                      ?>
                    <div class="row">
                      <div class="col-3 text-center">
                        <img class="img-fluid" src="../imagen/<?php echo $datos[$i]['Imagen']; ?>" width="100px" height="100px">
                      </div>
                      <div class="col-9 my-2">
                        <div class="row">
                            <small><a class="enlace2" href="#"><?php echo $datos[$i]['Nombre'];?></a></small>
                            <span class="ml-auto"><?php echo number_format($total_modelo,2,',','.');?> Bs.S</span>
                        </div>
                        <div class="row">
                          <small>TALLA: <span class="text-muted"><?php echo " ".$datos[$i]['Talla']?></span></small>
                        </div>
                        <div class="row">
                          <small>Color(es): <span class="text-muted">Azul / Verde</span></small>
                        </div>
                        <div class="row">
                          <small>CANTIDAD: <span class="text-muted"><?php echo " ".$datos[$i]['Cantidad'];?></span></small>
                        </div>
                        <div class="row mt-2">
                          <button type="button" class="enlace2 mr-4" href="javascript:void(0)" data-toggle="modal" data-target="#edit<?php echo $datos[$i]['Id'];?>">Editar</button>
                          <button type="button" class="enlace2" href="javascript:void(0)" data-toggle="modal" data-target="#del<?php echo $datos[$i]['Id'];?>">Eliminar</button>
                        </div>
                      </div>
                    </div>
                    <!-- Large modal -->
                    <div class="modal" id="del<?php echo $datos[$i]['Id'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="closeSesionLabel">Eliminar Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            ¿Seguro que desea eliminar este articulo(s) del carrito?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                            <a href="common/salir_sesion.php" class="btn btn-outline-danger">Eliminar</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Large modal -->
                    <div class="modal fade bd-example-modal-lg" id="edit<?php echo $datos[$i]['Id'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="closeSesionLabel">Editar Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="container-fluid">
                              <div class="row">
                                <div class="col-7 text-center">
                                  <img class="img-fluid" src="../imagen/<?php echo $datos[$i]['Imagen']; ?>" width="300px" height="300px">
                                </div>
                                <div class="col-4">
                                  <div class="container-fluid">
                                    <div class="row">
                                      <div class="col-12">
                                        <p class="text-muted">Franela de Dama</p>
                                        <h2><b><?php echo $datos[$i]['Nombre'];?></b></h2>
                                      </div>
                                      <div class="col-12 mb-4">
                                        <h3 class="lead">200,00 Bs.S</h3>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-8 mb-2">
                                        Talla
                                      </div>
                                      <div class="col-4 mb-2">
                                        Cantidad
                                      </div>
                                    </div>
                                    <form class="" action="carrito.php" method="post" onsubmit="return validacion()">
                                      <div class="row">
                                        <div class="col-5">
                                          <select class="lista-talla" name="talla" id="search" onchange="talla_dis()" required>
                                            <option value="">S</option>
                                            <option value="">M</option>
                                            <option value="">L</option>
                                            <option value="">XL</option>
                                          </select>
                                        </div>
                                        <div class="col-2 offset-3">
                                          <input  type="number" max="10" min="1" maxlength="4" value="1" name="cantidad"
                                           id="cant" required>
                                        </div>
                                      </div>
                                      <input type="hidden" name="id" id='idinv' value="1">
                                      <div class="row mt-3">
                                        <div class="col-12">
                                          <button class="btn btn-outline-dark" type="submit">Actualizar artículo</button>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <?php
                    $total=$datos[$i]['Cantidad']*$datos[$i]['Precio'] + $total;
                    } ?>
                    <div class="text-secondary text-center">
                      <form action="../index.php">
                        <button type="reset">Vaciar el Carrito</button>
                      </form>
                    </div>
                    <hr>
                  </div>
                  <div class="col-sm-4 mt-2">
                    <div class="container bg-dark">
                      <div class="row my-3 py-3 pl-2">
                        <h5 class="text-white">Resumen</h5>
                      </div>
                      <hr class="hr">
                      <div class="row text-white my-2 justify-content-between">
                        <p class="col-6"><b>SubTotal:</b></p>
                        <p class="col-auto"><b><?php echo number_format($total,2,',','.');?> Bs.S</b></p>
                      </div>
                      <div class="row text-white mt-2 justify-content-between">
                        <p class="col-6"><b>IVA:</b></p>
                        <p class="col-auto mb-0"><b>0,00 Bs.S</b></p>
                        <p class="col-12 text-white-50"><small>El impuesto declarado por los productos corresponden a las leyes de la República Bolivariana de Venezuela. <a href="../faq/index.php?id=2" target="_blank">Ver más.</a> </small> </p>
                        <!--<p class="col-12 text-white-50"><small>Estos costos se basan en las agencias de encomiendas con las que trabajamos. <a href="../faq/index.php?id=2" target="_blank">Ver más.</a> </small> </p>-->
                      </div>
                      <hr class="hr">
                      <div class="row text-white my-2 justify-content-between">
                        <p class="col-6"><b>Total:</b></p>
                        <p class="col-auto"><b><?php echo number_format($total,2,',','.');?> Bs.S</b></p>
                      </div>
                      <div class="row justify-content-center">
                        <form action="datos_compra.php">
                          <input class="btn btn-link btn-lg" type="submit" value="Comprar">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
    <div class="jumbotron mb-0 mt-5">
      <h1 class="display-4">¡Se un Vendedor Rouxa!</h1>
      <p class="lead">Podrás vender nuestros productos sin tener que realizar alguna inversión.</p>
      <hr class="my-4">
      <p>Solo tendrás que dar tu código de Vendedor Rouxa a tu cliente, y este comprará a tu nombre los articúlos que desee.</p>
      <a class="btn btn-secondary btn-lg disabled mt-3" href="" role="button">Próximamente</a>
    </div>
<?php include_once '../common/footer2.php';?>
<script type="text/javascript">
  var cantidad = <?php echo $cantidad_total; ?>;
  document.getElementById("title").innerHTML = "Tu Carrito ("+cantidad+")";
</script>
    <script src="../admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
