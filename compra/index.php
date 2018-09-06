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
      <div class="row mt-5">
        <div class="col-2">
          <div class="row justify-content-center">
            <div class="col-12">
              <div id="myresult" class="img-zoom-result"></div>
            </div>
          </div>
        </div>
        <div class="col-6 text-center">
          <div class="img-zoom-container">
            <img src="<?php echo $f['IMAGEN'];?>" width="600px" height="650px" id="myimage"/>
          </div>
        </div>
        <div class="col-3">
          <div class="container">
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
                  Ve a compras <a href="../vitrina/index.php?genero=4">Al Mayor</a>, y aprovecha las ofertas.</small>
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
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
    <section class="container details my-5 pb-3">
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
                 <div class="container">
                   <div class="row">
                     <div class="col-12">
                       Excelente para un paseo por la ciudad o el parque. Ir al gimnasio y salir a trotar.<br>
                       Modelo Deportivo - Casual.<br>
                       Totalmente fresca y cómoda, ajustable al cuerpo.
                     </div>
                   </div>
                 </div>
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
                 <div class="container">
                   <div class="row">
                     <div class="col-6">
                       
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
    </section>
    <?php include_once '../common/footer2.php';?>
    <script src="../admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../admin/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
