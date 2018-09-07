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
    </head>
    <body>
     <?php
      include_once '../common/menu2.php';
      include_once '../common/2domenu2.php';
      $sql= 'select * FROM PRODUCTOS WHERE IDPRODUCTO='.$idproducto;
      $res= $conn->query($sql);
      while($f=$res->fetch_assoc()){
    ?>
    <div class="container-fluid my-5">
      <div class="row mt-5">
        <div class="col-1">
          <div class="row justify-content-center">
            <div class="col-12">
            </div>
          </div>
        </div>
        <div class="col-6 text-center">
            <img src="../imagen/19ca14e7ea6328a42e0eb13d585e4c22.jpg" class="container-imagen" width="600px" height="650px" id="myimage"/>
            <!--<div class="text-block">
              <div id="myresult" class="img-zoom-result"></div>
            </div>-->
        </div>
        <div class="col-4">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <p class="text-muted">Franela de Dama</p>
                <h2><b>Franela De Dama Nike</b></h2>
              </div>
              <div class="col-12 mb-4">
                <h3 class="lead">200,00 Bs.S</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-8 mb-2">
                Selecciona la Talla
              </div>
              <div class="col-4 mb-2">
                Cantidad
              </div>
            </div>
            <div class="row">
              <div class="col-5">
                <select class="lista-talla" name="talla">
                  <option value="s">S</option>
                  <option value="m">M</option>
                  <option value="l">L</option>
                  <option value="xl">XL</option>
                  <option value="xxl">XXL</option>
                </select>
              </div>
              <div class="col-2 offset-3">
                <select class="lista-talla-2" name="talla">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                </select>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12">
                <a class="btn btn-outline-dark" href="#">AÑADIR AL CARRITO</a>
              </div>
            </div>
            <hr class="my-4">
            <div class="row">
              <div class="col-12">
                <small class="text-muted"><span class="text-dark">¿Deseas comprar mas de 12 piezas?</span><br>
                  Ve a compras <a href="../vitrina/index.php?genero=4">Al Mayor</a>, y aprovecha las mejores ofertas.</small>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12">
                <small class="text-muted"><span class="text-dark">¿No encuentras las tallas que deseas?</span><br>
                  Ve a <a href="../vitrina.php?genero=4">solicitud de pedido</a>, y consulta por las otras tallas.</small>
              </div>
            </div>
            <hr class="my-3">
            <div class="row mt-3">
              <div class="col-12">
                <small class="text-muted"><b>¿Como hacemos los envíos?</b> <br>
                  Los Envíos lo hacemos mediante agencias de encomiendas. <a href="../faq/index.php?id=2" target="_blank">Ver más</a></small>
              </div>
            </div>
            <hr class="mt-3">
            <div class="row">
              <div class="container-fluid mt-4">
                 <h5 class="text-white text-center bg-dark py-2 lead">
                   Detalles del Producto
                 </h5>
              </div>
              <div class="container">
                <div class="row justify-content-center">
                <div class="col-12 text-center">
                 <div class="accordion" id="accordionExample">
                   <div class="card">
                     <div class="card-header container-fluid bg-dark" id="hone">
                       <h5 class="mb-0">
                         <button class="btn btn-link text-white" type="button" data-toggle="collapse" data-target="#one" aria-expanded="true" aria-controls="collapseOne">
                           Descripción
                         </button>
                       </h5>
                     </div>
                     <div id="one" class="collapse" aria-labelledby="hone" data-parent="#accordionExample">
                       <div class="card-body">
                         <div class="container-fluid">
                           <div class="row">
                             <div class="col-12 text-left">
                               <small>
                               Excelente para un paseo por la ciudad o el parque.
                               <br>Ir al gimnasio y salir a trotar.<br>
                               Modelo Deportivo - Casual.<br>
                               Totalmente fresca y cómoda, ajustable al cuerpo.</small>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="card">
                     <div class="card-header bg-dark" id="htwo">
                       <h5 class="mb-0">
                         <button class="btn btn-link collapsed text-white" type="button" data-toggle="collapse" data-target="#two" aria-expanded="false" aria-controls="collapseTwo">
                           Características
                         </button>
                       </h5>
                     </div>
                     <div id="two" class="collapse" aria-labelledby="htwo" data-parent="#accordionExample">
                       <div class="card-body">
                         <div class="container-fluid">
                           <div class="row">
                             <div class="col-12 text-left">
                               <small>
                               -- <b>Manga:</b>Corta<br>
                               -- <b>Cuello:</b> Redondo <br>
                               -- <b>Material:</b> Algodon Jersey Ring <br>
                               -- <b>Peso de la franela:</b> <br>
                                --- Talla S: 75 gr.<br>
                                --- Talla M: 82 gr.<br>
                                --- Talla L: 90 gr.<br>
                                </small>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                   </div>
                 </div>
               </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <!-- Div de Detalles
  <section class="container details my-5 pb-3"></div>
    </section>-->
    <?php include_once '../common/footer2.php';?>
    <script type="text/javascript">
    function imageZoom(imgID, resultID) {
    var img, lens, result, cx, cy;
    img = document.getElementById(imgID);
    result = document.getElementById(resultID);
    /*create lens:*/
    lens = document.createElement("DIV");
    lens.setAttribute("class", "img-zoom-lens");
    /*insert lens:*/
    img.parentElement.insertBefore(lens, img);
    /*calculate the ratio between result DIV and lens:*/
    cx = result.offsetWidth / lens.offsetWidth;
    cy = result.offsetHeight / lens.offsetHeight;
    /*set background properties for the result DIV*/
    result.style.backgroundImage = "url('" + img.src + "')";
    result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
    /*execute a function when someone moves the cursor over the image, or the lens:*/
    lens.addEventListener("mousemove", moveLens);
    img.addEventListener("mousemove", moveLens);
    /*and also for touch screens:*/
    lens.addEventListener("touchmove", moveLens);
    img.addEventListener("touchmove", moveLens);
    function moveLens(e) {
      var pos, x, y;
      /*prevent any other actions that may occur when moving over the image*/
      e.preventDefault();
      /*get the cursor's x and y positions:*/
      pos = getCursorPos(e);
      /*calculate the position of the lens:*/
      x = pos.x - (lens.offsetWidth / 2);
      y = pos.y - (lens.offsetHeight / 2);
      /*prevent the lens from being positioned outside the image:*/
      if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
      if (x < 0) {x = 0;}
      if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
      if (y < 0) {y = 0;}
      /*set the position of the lens:*/
      lens.style.left = x + "px";
      lens.style.top = y + "px";
      /*display what the lens "sees":*/
      result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
    }
    function getCursorPos(e) {
      var a, x = 0, y = 0;
      e = e || window.event;
      /*get the x and y positions of the image:*/
      a = img.getBoundingClientRect();
      /*calculate the cursor's x and y coordinates, relative to the image:*/
      x = e.pageX - a.left;
      y = e.pageY - a.top;
      /*consider any page scrolling:*/
      x = x - window.pageXOffset;
      y = y - window.pageYOffset;
      return {x : x, y : y};
    }
    }
    </script>
    <script>
    imageZoom("myimage", "myresult");
    </script>
    <script src="../admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
