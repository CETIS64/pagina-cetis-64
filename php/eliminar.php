<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM productos WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE){
	echo '<script type="text/javascript"> alert("Eliminado correctamente"); window.location="listar.php";</script>';
	exit;
}
else echo "Algo salió mal";
?>
