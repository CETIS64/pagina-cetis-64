<?php
if(!isset($_POST["total"])) exit;
session_start();

$total = $_POST["total"];
$curp  = $_POST["curp"];
include_once "base_de_datos.php";


$ahora = date("Y-m-d H:i:s");


$sentencia = $base_de_datos->prepare("INSERT INTO ventas(fecha, total, curp) VALUES (?, ?, ?);");
$sentencia->execute([$ahora, $total, $curp]);

$sentencia = $base_de_datos->prepare("SELECT id FROM ventas ORDER BY id DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->id;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO productos_vendidos(id_producto, id_venta, cantidad) VALUES (?, ?, ?);");
$sentenciaExistencia = $base_de_datos->prepare("UPDATE productos SET existencia = existencia - ? WHERE id = ?;");
foreach ($_SESSION["carrito"] as $producto) {
	$total += $producto->total;
	$sentencia->execute([$producto->id, $idVenta, $producto->cantidad]);
	$sentenciaExistencia->execute([$producto->cantidad, $producto->id]);
}
$base_de_datos->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
  echo '<script type="text/javascript"> alert("Procesando peticion");</script>';
?><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><BR><CENTER>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="R3YPK7Y8C9PSU">
<input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
</CENTER>
