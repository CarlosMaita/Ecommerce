<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../../common/conexion.php';
#consulta de la existencia de los post
if (isset($_POST['idproducto'], $_POST['nombre_p'], $_POST['descripcion'], $_POST['genero'], $_POST['tipo'], $_POST['precio'], $_POST['cuello'], $_POST['manga'], $_POST['material'], $_POST['marca'])){
//LECTURA DE VARIABLES
$idproducto=$_POST['idproducto'];
echo "id: $idproducto";
$nombre_p = $_POST['nombre_p'];
$descripcion =  $_POST['descripcion'];
$genero= $_POST['genero'];
$tipo=$_POST['tipo'];
$precio =  $_POST['precio']; //double
/*Tipos de cuello
(0) - No aplica
(1) - Redondo
(2) - En V
(3) - Mao
(4) - Chemise
*/
$cuello=$_POST['cuello']; //entero
/*Tipo de manga
(0) - No aplica
(1) - Corta
(2) - Tres Cuarto
(3) - Larga
(4) - Sin Manga
*/
$manga=$_POST['manga']; //Entero
$material=$_POST['material'];
$marca=$_POST['marca'];
//ESCRIBE EL COMANDO SQL para actualizar
$sql="UPDATE `PRODUCTOS` SET `NOMBRE_P`='$nombre_p',`DESCRIPCION`='$descripcion',`GENERO`=$genero,`TIPO`='$tipo',`PRECIO`='$precio',`MATERIAL`='$material',`MARCA`='$marca',`MANGA`=$manga,`CUELLO`=$cuello WHERE IDPRODUCTO=$idproducto";
if ($conn->query($sql) === TRUE) {
    echo "<p>PRODUCTO Modificado</p>";
    header('Location: ./producto.php');
   } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else{
   echo 'producto no registrado, ocurrio un error';
 }
$conn->close();
