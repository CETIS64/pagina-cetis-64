<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE id = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
		echo'<script language="javascript">alert("No existe ese producto");window.location.href="listar.php"</script> ';
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto numero: <?php echo $producto->id; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $producto->id; ?>">

			<label for="codigo">Especialidad:</label>
			<input value="<?php echo $producto->especialidad ?>" class="form-control" name="especialidad" required type="text" id="especialidad" placeholder="Escribe la especialidad">
			<label for="codigo">Nombre:</label>
			<input value="<?php echo $producto->nomp ?>" class="form-control" name="nomp" required type="text" id="nomp" placeholder="Escribe el nombre">
			<label for="descripcion">Descripción:</label>
			<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"><?php echo $producto->descripcion ?></textarea>

			<label for="precioVenta">Precio de venta:</label>
			<input value="<?php echo $producto->precioVenta ?>" class="form-control" name="precioVenta" required type="number" id="precioVenta" placeholder="Precio de venta">

			<label for="precioCompra">$$ elaboración:</label>
			<input value="<?php echo $producto->precioCompra ?>" class="form-control" name="precioCompra" required type="number" id="precioCompra" placeholder="Precio de compra">

			<label for="existencia">Existencia:</label>
			<input value="<?php echo $producto->existencia ?>" class="form-control" name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia">
			<br><center><label for="existencia">Imagen:</label>
			<img src="<?php echo $producto->ruta ?>" width="150" height="150"/></center>

			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
