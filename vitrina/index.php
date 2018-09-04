<?php
include '../common/conexion.php';
include '../common/TasaUSD2.php';
$publicidad="¡Compra Los mejores productos!";
if(isset($_GET['genero'])){
    $genero=$_GET['genero'];
    switch($genero){
        case '1':
              $publicidad="¡Compra los mejores productos para Damas!";
            break;
        case '2':
              $publicidad="¡Compra los mejores productos para Caballeros!";
            break;
        case '4':
             $publicidad="¡Compra Al Mayor y obtén excelentes descuentos!";
            break;
    }
}else{$genero=3;}
if(isset($_GET['tipo'])){
    $tipo=$_GET['tipo'];
    switch($tipo){
        case 'franela':
             $publicidad="¡Las mejores y más cómodas Franelas!";
            break;
        case 'chemise':
             $publicidad="¡Chemises para todos los gustos!";
            break;
        case 'pantalon':
             $publicidad="¡Pantalones excelentes!";
            break;
        case 'zapatos':
             $publicidad="¡Compra Zapatos de diferentes marcas y estilos!";
            break;
    }
}else{ $tipo='null'; }
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="desciption" content="Rouxa, Tienda virtual de Ropa para Damas, Caballeros y Niños.">
    <meta name="keywords" content="Rouxa, Ropa, Damas, Caballeros, Zapatos, Tienda Virtual">
    <meta name="author" content="Eutuxia, C.A.">
    <meta name="application-name" content="Tienda Virtual de Ropa, Rouxa."/>
    <link rel="icon" type="image/jpg" sizes="16x16" href="../imagen/favicon.jpg">
    <link rel="stylesheet" href="../css/style-main.css">
    <link href="../css/new.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-8952175764108741",
    enable_page_level_ads: true
  });
</script>
    <title>Rouxa</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="../index.php">Rouxa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <?php
                  switch($genero){
                      case '1':
                          ?>
                          <li class="nav-item active">
                            <a class="nav-link" href="../vitrina/index.php?genero=1">Damas</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../vitrina/index.php?genero=2">Caballeros</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../vitrina/index.php?genero=4">Al Mayor</a>
                          </li>
                          <?php
                          break;
                      case '2':
                           ?>
                          <li class="nav-item">
                            <a class="nav-link" href="../vitrina/index.php?genero=1">Damas</a>
                          </li>
                          <li class="nav-item active">
                            <a class="nav-link" href="../vitrina/index.php?genero=2">Caballeros</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../vitrina/index.php?genero=4">Al Mayor</a>
                          </li>
                          <?php
                          break;
                      case '4':
                            ?>
                          <li class="nav-item">
                            <a class="nav-link" href="../vitrina/index.php?genero=1">Damas</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../vitrina/index.php?genero=2">Caballeros</a>
                          </li>
                          <li class="nav-item active">
                            <a class="nav-link" href="../vitrina/index.php?genero=4">Al Mayor</a>
                          </li>
                          <?php
                          break;
                      default:
                             ?>
                            <li class="nav-item">
                              <a class="nav-link" href="../vitrina/index.php?genero=1">Damas</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="../vitrina/index.php?genero=2">Caballeros</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="../vitrina/index.php?genero=4">Al Mayor</a>
                            </li>
                               <?php
                          break;
                  }
                   ?>
            <li class="nav-item">
              <a class="nav-link" href="../compras/index.php">Compras</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Vendedores</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="../faq/index.php">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../contacto/index.php">Contacto</a>
            </li>
          </ul>
          <ul class="nav justify-content-end pr-3">
            <li class="nav-item"><a class="enlace" href="../compra/carrito.php"><i class="fa fa-shopping-cart"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <?php include_once '../common/2domenu2.php'; ?>
    <div class="container-fluid breadcrumb">
      <div class="container text-center py-2" style="font-family: 'Playfair Display', serif;">
        <h2 class="display-5"><?php echo $publicidad; ?></h2>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-2">
          <div class="container">
          <h5>Filtros</h5>
          <hr>
          <div class="row">
            <div class="col-12"><b>Genero</b></div>
            <div class="col-12"><small><a href="#">Dama</a></small></div>
            <div class="col-12"><small><a href="#">Caballero</a></small></div>
            <div class="col-12"><small><a href="#">Niña</a></small></div>
            <div class="col-12"><small><a href="#">Niño</a></small></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-12"><b>Marca</b></div>
            <div class="col-12"><small><a href="#">Rouxa</a></small></div>
            <div class="col-12"><small><a href="#">Nike</a></small></div>
            <div class="col-12"><small><a href="#">Adidas</a></small></div>
            <div class="col-12"><small><a href="#">Puma</a></small></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-12"><b>Color</b></div>
            <div class="col-3 mt-2"><a href="#" title="Gris" data-toggle="tooltip"><span class="dot3" style="background-color:#123e45;"></a></div>
            <div class="col-3 mt-2"><a href="#" title="Vinotinto" data-toggle="tooltip"><span class="dot3" style="background-color:#aa3e45;"></a></div>
            <div class="col-3 mt-2"><a href="#" title="Rojo" data-toggle="tooltip"><span class="dot3" style="background-color:#f23e45;"></a></div>
            <div class="col-3 mt-2"><a href="#" title="Azul" data-toggle="tooltip"><span class="dot3" style="background-color:#123eaf;"></a></div>
            <div class="col-3 mt-2"><a href="#" title="Blanco" data-toggle="tooltip"><span class="dot3" style="background-color:#ddd;"></a></div>
            <div class="col-3 mt-2"><a href="#" title="Violeta" data-toggle="tooltip"><span class="dot3" style="background-color:#ad12fe;"></a></div>
            <div class="col-3 mt-2"><a href="#" title="Amarillo" data-toggle="tooltip"><span class="dot3" style="background-color:#afa111;"></a></div>
            <div class="col-3 mt-2"><a href="#" title="Morado" data-toggle="tooltip"><span class="dot3" style="background-color:#fa34bc;"></a></div>
          </div>
          <hr>
        </div>
        </div>
        <div class="col-10">
          <div class="container-fluid">
            <div class="row justify-content-between">
              <div class="col-6 align-self-center">
                <b>TODOS LOS PRODUCTOS <span class="text-muted">[100]</span></b>
              </div>
              <div class="col-4">
                <div class="row">
                  <div class="col-5 text-dark align-self-center">
                    <b>ORDENAR POR:</b>
                  </div>
                  <div class="col-6">
                    <select name="orden" class="text-secondary">
                      <option value=""></option>
                      <option value="1"><a href="../index.php">Menor precio</a></option>
                      <option value="2"><a href="#">Mayor precio</a></option>
                    </select>
                  </div>
              </div>
              </div>
            </div>
            <div class="row">
          <?php
        $offset=0;
        $void=false;
        $numProd=4;
        $rand=rand();
         while(!$void){
          $sql = "SELECT * FROM PRODUCTO ORDER BY Rand($rand) LIMIT $numProd OFFSET $offset";
           if (isset($_GET['genero'])){
               if (!empty($genero)){
                   $sql_genero='WHERE GENERO='.$genero;
                   $sql = "SELECT * FROM PRODUCTO $sql_genero ORDER BY Rand($rand) LIMIT $numProd OFFSET $offset";
               }
           }
           if( isset($_GET['tipo'])){
               if (!empty($tipo)){
               $sql_tipo="WHERE TIPO='$tipo'";
               $sql = "SELECT * FROM PRODUCTO $sql_tipo  ORDER BY Rand($rand) LIMIT $numProd OFFSET $offset";
               }
           }
        $result = $conn->query($sql);
        $cant=$result->num_rows;
        if ($cant > 0) {
            ?>
       <article class="container my-4">
         <div class="card-deck">
                  <?php
           while($row = $result->fetch_assoc()){
              ?>
          <div class="card" >
            <a href="../compra/index.php?id=<?php echo $row['IDPRODUCTO']; ?>"><img class="card-img-top img-fluid vitrina" src="<?php echo $row['IMAGEN']; ?>" alt="<?php echo $row['NOMBRE_P']; ?>"></a>
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['NOMBRE_P']; ?></h5>
              <p class="text-muted">Franela ajustable al cuerpo, fresca y comoda.</p>
              <p class="card-text"><small class="text-secondary">Precio: <?php echo number_format($row['PRECIO']*$tasa_usd, 2, ',', '.'); ?>  Bs</small></p>
            </div>
          </div>
           <?php
               }
             for($i=0; $i<$numProd-$cant;$i++){ echo '<div class="card" style="border:none"></div>'; }
            ?>
                </div>
          </article>
            <?php
            $offset=$offset+$numProd;
           }
           else{ $void=true; }
         }
         ?>
           </div>
          </div>
        </div>
      </div>
    </div>
<?php include_once '../common/footer2.php';?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>