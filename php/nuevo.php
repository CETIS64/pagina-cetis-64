<?php include_once "encabezado.php" ?>
<?php

if(!isset($_POST["especialidad"])|| !isset($_POST["nomp"]) || !isset($_POST["descripcion"]) || !isset($_POST["precioVenta"]) || !isset($_POST["precioCompra"]) || !isset($_POST["existencia"])|| !isset($_FILES['img'])) exit();
{
include ("conexion.php");
include_once "base_de_datos.php";
$especialidad = $_POST["especialidad"];
$nomp = $_POST['nomp'];
$descripcion = $_POST['descripcion'];
$precioVenta = $_POST['precioVenta'];
$precioCompra = $_POST['precioCompra'];
$existencia = $_POST['existencia'];
$nombreImg=$_FILES['img']['name'];
$ruta=$_FILES['img']['tmp_name'];
$destino="imagenes/".$nombreImg;
if(copy($ruta,$destino)){
    $sql="INSERT INTO `productos`( especialidad, nomp, descripcion, precioVenta, precioCompra, existencia, nombre, ruta) VALUES (' $especialidad','$nomp','$descripcion', '$precioVenta', '$precioCompra', '$existencia', '$nombreImg', '$destino')";
    $res=mysqli_query($cn,$sql);
    if($res){
        echo '<script type="text/javascript"> alert("Agregado Correctamente"); window.location="listar.php";</script>';

    }else{
        die("Error".mysqli_error($cn));
    }


}else{
  echo '<script type="text/javascript"> alert("Error"); window.location="listar.php";</script>';
}}
?>
