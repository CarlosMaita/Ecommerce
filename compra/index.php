<?php
  include '../common/conexion.php';
  include '../common/TasaUSD2.php';
    $lista_tallas='';
if(isset($_GET['idproducto'], $_GET['idmodelo'])){
        $idproducto=$_GET['idproducto'];
        $idmodelo=$_GET['idmodelo'];
        $sql= 'SELECT * FROM INVENTARIO i INNER JOIN MODELOS m ON m.IDMODELO=i.IDMODELO WHERE i.IDMODELO='.$idmodelo;
            $res= $conn->query($sql);
            $arreglo[] = NULL;
           if ($res->num_rows > 0){
            while($f=$res->fetch_assoc()){
                $lista_tallas=$lista_tallas.'<option value="'.$f['TALLA'].'">'.$f['TALLA'].'</option>';
                $newarreglo=array('Talla'=>$f['TALLA'], 'Cantidad'=> $f['CANTIDAD']);
                array_push($arreglo,$newarreglo);
            }
           }else{
               $lista_tallas='<option value="N/D">N/D</option>';
                 $newarreglo=array('Talla'=>'N/D', 'Cantidad'=>'0');
                 array_push($arreglo,$newarreglo);
            }
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="desciption" content="Rouxa, Tienda virtual de Ropa para Damas, Caballeros y Niños.">
    <meta name="keywords" content="Rouxa, Ropa, Damas, Caballeros, Zapatos, Tienda Virtual">
    <meta name="author" content="Eutuxia, C.A.">
    <meta name="application-name" content="Tienda Virtual de Ropa, Rouxa."/>
    <link rel="stylesheet" href="../css/style-main.css">
    <link rel="stylesheet" href="../css/new.css">
    <link rel="icon" type="image/jpg" sizes="16x16" href="../imagen/favicon.jpg">
    <link href="../admin/assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <title>Rouxa</title>
    <script>
    function imageZoom(imgID, resultID){
      var img, lens, result, cx, cy;
      img = document.getElementById(imgID);
      result = document.getElementById(resultID);
      lens = document.createElement("DIV");
      lens.setAttribute("class", "img-zoom-lens");
      img.parentElement.insertBefore(lens, img);
      cx = result.offsetWidth / lens.offsetWidth;
      cy = result.offsetHeight / lens.offsetHeight;
      result.style.backgroundImage = "url('" + img.src + "')";
      result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
      lens.addEventListener("mousemove", moveLens);
      img.addEventListener("mousemove", moveLens);
      lens.addEventListener("touchmove", moveLens);
      img.addEventListener("touchmove", moveLens);
      function moveLens(e){
        var pos, x, y;
        e.preventDefault();
        pos = getCursorPos(e);
        x = pos.x - (lens.offsetWidth / 2);
        y = pos.y - (lens.offsetHeight / 2);
        if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
        if (x < 0) {x = 0;}
        if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
        if (y < 0) {y = 0;}
        lens.style.left = x + "px";
        lens.style.top = y + "px";
        result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
      }
      function getCursorPos(e){
        var a, x = 0, y = 0;
        e = e || window.event;
        a = img.getBoundingClientRect();
        x = e.pageX - a.left;
        y = e.pageY - a.top;
        x = x - window.pageXOffset;
        y = y - window.pageYOffset;
        return {x : x, y : y};
      }
    }
    imageZoom("myimage", "myresult");
    </script>
    </head>
    <body>
     <?php
      include_once '../common/menu2.php';
      include_once '../common/2domenu2.php';
      $sql= 'select * FROM PRODUCTOS WHERE IDPRODUCTO='.$idproducto;
      $res= $conn->query($sql);
      while($f=$res->fetch_assoc()){
    ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-2">
          <div class="row justify-content-center">
            <div class="col-12">
              <div id="myresult" class="img-zoom-result"></div>
            </div>
          </div>
        </div>
        <div class="col-6 text-center">
          <div class="img-zoom-container">
            <img src="<?php echo $f['IMAGEN'];?>" width="500px" height="650px" id="myimage"/>
          </div>
        </div>
        <div class="col-3">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <!--<div class="detalle">
                  <nav id="texto">
                    <ul class="menu-top">
                      <li onclick="tablero(true)"><a id="stock">Stock</a></li>
                      <li onclick="tablero(false)"><a id="pedido">Solicitud de Pedido</a></li>
                    </ul>
                    <div id="stock-block">
                      <?php
                          $nombre_p= $f["NOMBRE_P"];
                          $des=$f["DESCRIPCION"];
                          $precio=$f["PRECIO"]*$tasa_usd;
                      ?>
                      <h1 class="text-muted" id="nombre-p"><?php echo $nombre_p;?></h1>
                      <p id="des" class="text-muted"><?php echo $des;?></p>
                      <p id="precio" class="text-muted"><?php echo number_format($precio, 2, ',', '.');?> Bs</p>
                      <?php } ?>
                      <form action="carrito.php" method="POST" onsubmit="return validacion()">
                        <div class="cantidad">
                           <ul>
                             <li>
                               <select name="talla" id="search" onchange="talla_dis()" class="text-muted">
                                   <?php echo $lista_tallas;?>
                               </select>
                             </li>
                             <li>
                               <input type="number" max="<?php echo $arreglo[1]['Cantidad']; ?>" min="1" maxlength="4" value="1" name="cantidad"
                               id="cant" class="text-muted text-center">
                               <input type="text" name="id" value="<?php echo $_GET["id"];?>" hidden="hidden" class="text-muted text-center">
                             </li>
                           </ul>
                           <p id="dispo" class="text-muted ">Disponibilidad: <?php echo $arreglo[1]['Cantidad']; ?> [piezas]</p>
                        </div>
                        <center>
                          <input type="submit" value="Añadir al carrito" class="btn btn-primary btn-ms py-2">
                        </center>
                      </form>
                    </div>
                    <div id="pedido-block">
                      <h1 class="text-muted" id="nombre-p"><?php echo $nombre_p;?></h1>
                        <p id="des"><?php echo $des;?></p>
                        <p id="precio" class="text-primary"><?php echo number_format($precio, 2, ',', '.'); ?> Bs</p>
                      <form action="../contacto/index.php" method="POST">
                        <div class="cantidad">
                          <ul>
                            <li>
                             <select name="talla" id="search">
                               <option value="XXL">XXL</option>
                               <option value="XL">XL</option>
                               <option value="L">L</option>
                               <option value="M">M</option>
                               <option value="S">S</option>
                               <option value="XS">XS</option>
                               <option value="XXS">XXS</option>
                             </select>
                            </li>
                            <li>
                              <input type="number" max="9999" min="1" maxlength="4" value="1" name="cantidad" id="cant">
                              <input type="text" name="id" value="<?php echo $_GET["id"];?>" hidden="hidden">
                            </li>
                          </ul>
                          <p id="dispo" class="text-dark">Ponte en contacto con nosotros.</p>
                        </div>
                        <center>
                          <input type="submit" value="Solicitar Producto" class="btn btn-primary btn-lg btn-block py-4">
                        </center>
                      </form>
                    </div>
                  </nav>
                </div>-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="container details mb-3 pb-3">
    <div class="container p-3">
       <h1 class="text-dark text-center">
         Detalles del Producto
       </h1>
       <hr class="my-4">
    </div>
      <div class="container">
        <div class="row justify-content-center">
        <div class="col-10 text-center">
         <div class="accordion" id="accordionExample">
           <div class="card">
             <div class="card-header" id="hone">
               <h5 class="mb-0">
                 <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#one" aria-expanded="true" aria-controls="collapseOne">
                   Descripción
                 </button>
               </h5>
             </div>
             <div id="one" class="collapse" aria-labelledby="hone" data-parent="#accordionExample">
               <div class="card-body">
                 Los envíos los realizamos de 24 a 48 horas, a partir de la confirmación en nuestras cuentas el pago del pedido.
               </div>
             </div>
           </div>
           <div class="card">
             <div class="card-header" id="htwo">
               <h5 class="mb-0">
                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#two" aria-expanded="false" aria-controls="collapseTwo">
                   Características
                 </button>
               </h5>
             </div>
             <div id="two" class="collapse" aria-labelledby="htwo" data-parent="#accordionExample">
               <div class="card-body">
                 Todo dependerá de la empresa de encomiendas, del lugar de destino, y de la fecha en la cual se realiza el envío (feriados, fin de semana). En promedio tarda de 2 a 7 días en llegar.
               </div>
             </div>
           </div>
           </div>
         </div>
       </div>
      </div>
    </div>
    </section>
    <?php include_once '../common/footer2.php';?>
    <script src="../admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
