<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["especialidad"]) ||
	!isset($_POST["nomp"]) ||
	!isset($_POST["descripcion"]) ||
	!isset($_POST["precioCompra"]) ||
	!isset($_POST["precioVenta"]) ||
	!isset($_POST["existencia"]) ||
	!isset($_POST["id"]))
exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$especialidad = $_POST["especialidad"];
$nomp = $_POST["nomp"];
$descripcion = $_POST["descripcion"];
$precioCompra = $_POST["precioCompra"];
$precioVenta = $_POST["precioVenta"];
$existencia = $_POST["existencia"];

$sentencia = $base_de_datos->prepare("UPDATE productos SET especialidad = ?,nomp =?, descripcion = ?, precioCompra = ?, precioVenta = ?, existencia = ? WHERE id = ?;");
$resultado = $sentencia->execute([$especialidad, $nomp, $descripcion, $precioCompra, $precioVenta, $existencia, $id]);

if($resultado === TRUE){
		echo'<script language="javascript">alert("Datos actualizados con éxito");window.location.href="listar.php"</script> ';}

	exit;

?>
