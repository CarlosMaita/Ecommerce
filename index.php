<?php
    session_start();
    include 'common/conexion.php';
    include 'common/TasaUSD.php';
    // put your code here
    if(isset($_GET['reset'])){ session_destroy();}
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="desciption" content="Rouxa es una nueva E-commerce Venezolana, creyente de la nueva era digital de venta por internet, fabricante de ropa de alta calidad y confort, cumpliendo con los estándares de moda exigidos por nuestros clientes nacionales e internacionales.">
    <meta name="keywords" content="Rouxa, Rouxa venezuela, Rouxa vzla, franelas, chemises, Tienda Virtual, Ecommerce venezuela, Ropa en venezuela, franelas comodas, Ropa venezuela">
    <meta name="author" content="Eutuxia, C.A.">
    <meta name="application-name" content="Tienda Virtual de Ropa, Rouxa."/>
    <link rel="icon" type="image/jpg" sizes="16x16" href="imagen/favicon.jpg">
    <link rel="stylesheet" href="css/style-main.css">
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
  <?php include_once 'common/menu.php';
        include_once 'common/2domenu.php';
  ?>
    <section class="container-fluid principal d-flex flex-column align-items-end justify-content-end pr-4 pb-5">
      <h1 class="display-2 text-muted" style="font-family: 'Playfair Display', serif;">Rouxa</h1>
      <p class="font-italic text-white">Estilo, Comodidad y Confort.</p>
    </section>
  <div class="jumbotron mb-0">
      <h1 class="display-4" style="font-family: 'Playfair Display', serif;">Rouxa Venezuela</h1>
      <p class="lead">Rouxa es una nueva E-commerce Venezolana, creyente de la nueva era digital de venta por internet, fabricante de ropa de alta calidad y confort, cumpliendo con los estándares de moda exigidos por nuestros clientes nacionales e internacionales.</p>
      <hr>
   <div class="jumbotron bg-dark mb-0">
     <h1 class="display-5 text-muted">¡Disfruta de Nuestras Promociones!</h1>
     <hr class="my-4">
     <p class="lead text-white-50" style="font-family: 'Playfair Display', serif;">Enterate de todas las promociones a través de nuestras redes sociales. Envios gratis, precios al Mayor, Promociones Especiales y ¡Mucho más!</p>
     <a class="btn btn-outline-light btn-lg mt-3" href="https://www.instagram.com/rouxavzla/" role="button" target="_blank">Siguenos en Instagram</a>
   </div>
    </div>
   <section class="principal2 container-fluid d-flex flex-column align-items-end justify-content-end pr-4 pb-3">
     <h5 class="display-4 lead text-light" style="font-family: 'Playfair Display', serif;">La familia es lo más importante</h5>
     <p class="font-italic text-muted h5">Creemos firmemente que tu familia es lo más importante para ti.</p>
   </section>
  <div class="jumbotron mb-0">
      <h1 class="display-4 mb-2" style="font-family: 'Playfair Display', serif;">Seguimiento de una compra</h1>
      <p class="lead">Ofrecemos una novedosa forma de hacerle seguimiento a cada compra realizada en Rouxa. Una Llave digital es la herramienta para conocer el estatus de cualquier compra, la llave digital solo se genera al momento de comprar.</p>
      <hr class="my-4">
      <small class="text-muted">La forma de usar la llave es insertandola en el seguidor de pedido que se encuetrará en el menu principal en "Compras". Podrás visualizar el estatus de un pedido, el número de guia
        (una vez que se envia el paquete) e información de la compra realizada. ¡La llave es enviada a su correo! <a href="faq/index.php">Ver más</a>
      </small>
    </div>
   <article class="container my-5">
     <div class="card-deck">
       <?php
     $sql = "SELECT * FROM PRODUCTO ORDER BY Rand() LIMIT 4";
     $result = $conn->query($sql);
     if ($result->num_rows > 0) {
     // output data of each row
        while($row = $result->fetch_assoc()) {
           ?>
       <div class="card" style="max-width: 100%; height: auto;">
         <a href="compra/index.php?id=<?php echo $row['IDPRODUCTO']; ?>"><img class="vitrina card-img-top img-fluid" src="imagen/<?php echo $row['IMAGEN']; ?>" alt="<?php echo $row['NOMBRE_P']; ?>"></a>
         <div class="card-body">
           <h5 class="card-title"><?php echo $row['NOMBRE_P']; ?></h5>
           <p class="card-text">Excelente para un paseo por la ciudad, el parque o el centro comercial. 100% Algodón.</p>
           <p class="card-text"><small class="text-muted">Precio: <?php echo number_format($row['PRECIO']*$tasa_usd, 2, ',', '.'); ?>  Bs.</small></p>
         </div>
       </div>
        <?php
            }
        }else{
            echo " <p>Aun no existen productos en Vitrina</p>";
        }?>
     </div>
   </article>
    <div class="jumbotron mb-0">
      <h1 class="display-4">¡Se un Vendedor Rouxa!</h1>
      <p class="lead">Podrás vender nuestros productos sin tener que realizar alguna inversión. ¡Ganarás un porcentaje de las ventas!</p>
      <hr class="my-4">
      <p>Solo tendrás que dar tu código de Vendedor Rouxa a tu cliente, y este comprará a tu nombre los articúlos que desee. <small><a href="faq/index.php?id=6">Más info.</a> </small> </p>
      <a class="btn btn-secondary btn-lg disabled mt-3" href="" role="button">Proximamente</a>
    </div>
<?php include_once 'common/footer.php';?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119925583-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-119925583-1');
</script>
  </body>
</html>
