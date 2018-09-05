<?php
include_once('../common/sesion2.php');
require('../../common/conexion.php');

#eliminar elemento 
if(isset($_GET['delete']) & !empty($_GET['delete'])){
    
    $idmodelo=$_GET['delete'];
   
    $sql ="DELETE FROM MODELOS WHERE IDMODELO='$idmodelo'";
    
       if ($conn->query($sql) === TRUE) {
           } else {
             echo '<script> alert("Error:'. $sql . '<br>'. $conn->error.'"); </script>';
        }
    
    
} 

$perpage  = 5;


if(isset($_GET['page']) & !empty($_GET['page'])){
	$curpage = $_GET['page'];
}else{
	$curpage = 1;
}

$start = ($curpage * $perpage) - $perpage;

#necesito el total de elementos

$PageSql = "SELECT * FROM MODELOS";
$pageres = mysqli_query($conn, $PageSql);
$totalres = mysqli_num_rows($pageres);

$endpage = ceil($totalres/$perpage);
$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;


 ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Administración de la E-Comerce Rouxa.">
    <meta name="author" content="Eutuxia Web, C.A.">
    <link rel="icon" type="image/jpg" sizes="16x16" href="../../imagen/favicon.jpg">
    <title>Rouxa - Administración</title>
    <link href="../../css/new.css" rel="stylesheet">
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
        <?php include('../common/navbar2.php'); ?>
        <div class="page-wrapper">
          <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                  <h4 class="page-title">Inventario</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="../principal.php">Inicio</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="index.php">Inventario</a>
                                </li>
                                  <li class="breadcrumb-item active" aria-current="page">Añadir/Eliminar Modelo</li>
                            </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-4 text-center">
                  <a class="btn btn-link text-success" href="producto.php">Agregar/Eliminar Producto</a>
                </div>
                <div class="col-4 text-center">
                  <a class="btn btn-link text-success" href="modelo.php">Agregar/Eliminar Modelo</a>
                </div>
                <div class="col-4 text-center">
                  <a class="btn btn-link text-success" href="tallas.php">Agregar/Eliminar Talla</a>
                </div>
              </div>
              <div class="row justify-content-center mt-1 bg-white py-2">
                <h3>Agregue las caracteristicas del modelo</h3>
              </div>
              
              <form class="" action="addModelo.php" method="POST" enctype="multipart/form-data">
              <div class="row mt-3">
                <div class="input-group mb-3 col-6">
                  <div class="input-group-prepend">
                    <label class="input-group-text"><b>Seleccione el producto</b></label>
                  </div>
                  <select name="producto" class="custom-select text-secondary">
                    <?php
                       $sql="SELECT * FROM PRODUCTOS";
                       $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                            ?>
                    <option value="<?=$row['IDPRODUCTO']?>"><?=$row['NOMBRE_P']?></option>
                            <?php            
                       }
                      }
                      
                      ?> 
                  </select>
                </div>
                <div class="input-group mb-3 col-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text"><b>Color principal</b></label>
                  </div>
                  <select name="color1" class="custom-select text-secondary">
                     <?php
                       $sql="SELECT * FROM COLOR";
                       $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                            ?>
                        <option value="<?=$row['IDCOLOR']?>"><?=$row['COLOR']?></option>
                            <?php            
                       }
                      }
                      
                      ?> 
                  </select>
                </div>
                <div class="input-group mb-3 col-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text"><b>Color secundario</b></label>
                  </div>
                  <select name="color2" class="custom-select text-secondary">
                     <?php
                       $sql="SELECT * FROM COLOR";
                       $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                            ?>
                        <option value="<?=$row['IDCOLOR']?>"><?=$row['COLOR']?></option>
                            <?php            
                       }
                      }
                      
                      ?> 
                  </select>
                </div>
                <div class="col-12">
                  <input class="form-group" name="archivo" type="file" required>
                </div>
              </div>
              <div class="row justify-content-center mb-3">
                <button type="submit" class="btn btn-outline-primary">Agregar</button>
              </div>
              </form>
               
               
                <div class="row mt-3">
                  <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Productos en Inventario</h4>
                      <h6 class="card-subtitle">Aca podras ver los productos que se encuentran en el inventario.</h6>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Genero</th>
                            <th scope="col">Prenda</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Precio</th>
                            <th scope="col">C. Ppal</th>
                            <th scope="col">C. Secd</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>

                         
                         
                             <?php
                                
                            
                             $sql = "SELECT * FROM MODELOS m 
                             INNER JOIN PRODUCTOS p ON p.IDPRODUCTO=m.IDPRODUCTO
                             LIMIT $start, $perpage";
                             $result = $conn->query($sql);
                             if ($result->num_rows > 0) {
                             // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $idcolor1 = $row['COLOR1'];
                                    $idcolor2 = $row['COLOR2'];
                                    
                                    $sql1="SELECT * FROM COLOR WHERE IDCOLOR='$idcolor1' LIMIT 1";
                                    $sql2="SELECT * FROM COLOR WHERE IDCOLOR='$idcolor2' LIMIT 1";
                                    
                                    #color 1
                                    $result1 = $conn->query($sql1);
                                    if ($result1->num_rows > 0) {
                                        while($row1 = $result1->fetch_assoc()) {
                                           $color1= $row1['COLOR'];
                                           $hex1=  $row1['HEX'];     
                                        }
                                    }
                                    #color 2
                                    $result2 = $conn->query($sql2);
                                    if ($result2->num_rows > 0) {
                                        while($row2 = $result2->fetch_assoc()) {
                                           $color2= $row2['COLOR'];
                                           $hex2=  $row2['HEX'];     
                                        }
                                    }
                                    
                                    
                                   ?>
                                  <tr>  
                                    <td scope="row"><img src="" alt=""/> </td>
                                    <th><?php echo $row['NOMBRE_P']; ?></th>
                                    <td><?php switch($row['GENERO']){case '1': echo 'Dama'; break; case '2': echo 'Caballero'; break; default: echo 'Otro'; break; }?></td>
                                    <td><?=ucwords($row['TIPO'])?></td>
                                    <td><?=ucwords($row['MARCA'])?></td>
                                    <td><?php echo number_format($row['PRECIO'], 2, ',', '.'); ?></td>
                                    <td><span class="dot2" style="background-color:<?=$hex1?>;"></span><?=$color1?></td>
                                    <td><span class="dot2" style="background-color:<?=$hex2?>;"></span><?=$color2?></td>
                                    <td><a href="modelo.php?delete=<?=$row['IDMODELO']?>" class="btn btn-outline-danger btn-sm" >Eliminar</a></td>
                                  </tr>
                                   
                                <?php
                                    }
                                } else{
                                    echo "Sin Productos";
                                }?>

                        </tbody>
                      </table>
                      
                        <center>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination justify-content-center">
                  <?php if($curpage != $startpage){ ?>
                    <li class="page-item">
                      <a class="page-link" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">firts</span>
                      </a>
                    </li>
                    <?php } ?>

                          <?php if($curpage >=2){ ?>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
                            <?php }  ?>
                            
                            <li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
                            
                            <?php if($curpage != $endpage){ ?>
                            <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
                        <?php } ?>
                          
                         <?php if($curpage != $endpage){ ?>
                        <li class="page-item">
                          <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Last</span>
                          </a>
                        </li>
                        <?php } ?>
                          </ul>
                        </nav>
                     </center>
                      
                      
                    </div>
                  </div>
                </div>
                </div>

            </div>
            <div class="container">
              <div class="container">
                <small>Todos los colores disponibles se eentran registrados en el sistema. Si desea agregar otros colores que no aparecen como opciones
                  de selección, ponte en contacto con el departamento de desarrollo y hazle llegar tu solicitud.</small>
              </div>
            </div>
            <?php include('../common/footer.php'); ?>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="../dist/js/waves.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <script src="../dist/js/custom.min.js"></script>
</body>
</html>
