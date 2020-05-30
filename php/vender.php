<?php
include_once "encabezado.php";?>

<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
session_start();
?>

<link rel="stylesheet" href="./css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/2.css">
	<link rel="stylesheet" href="css/estilo.css">


	<div class="col-xs-12"><br><br><br>
		<h1>Productos</h1>
		<table border="4">
			<tbody>
				<?php foreach($productos as $producto){ ?>
		     <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
					<td><center><img src="<?php echo $producto->ruta ?>" width="250" height="120"/><br>
					<strong>ID:<?php echo $producto->id ?></strong></center>
					<strong>Especialidad:</strong><?php echo $producto->especialidad ?><br>
					<strong>Nombre::</strong><?php echo $producto->nomp ?><br>
					<strong>Descripción::</strong><?php echo $producto->descripcion ?><br>
					<strong>Precio: $</strong><?php echo $producto->precioVenta ?><br>
				</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
					<?php } ?>
			</tbody>
		</table>
	</div>


<?php

if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>
	<div class="col-xs-12">
		<h1>Vender</h1>
		<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Compra realizada correctamente
						</div>
					<?php
				}else if($_GET["status"] === "2"){
					?>
					<div class="alert alert-info">
							<strong>Su compra está cancelada</strong>
						</div>
					<?php
				}else if($_GET["status"] === "3"){
					?>
					<div class="alert alert-info">
							<strong>:)</strong> Producto quitado de la lista
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-warning">
							<strong>Error:</strong> El producto no existe, solo los que estan en las imagenes
						</div>
					<?php
				}else if($_GET["status"] === "5"){
					?>
					<div class="alert alert-danger">
							<strong>Error: </strong>No hay producto
						</div>
					<?php
				}else{
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
						</div>
					<?php
				}
			}
		?>
		<br>
		<form method="post" action="agregarAlCarrito.php">
			<script type="text/javascript">

			function focusMethod(x){
			                  x.style.color="black";
			                  x.style.backgroundColor="#2CE1D4";

			    x.style.fontfamily="Ar Christy";
			              }
			          </script>
			<label for="codigo">Id de barras:</label>
			<input autocomplete="off" autofocus class="form-control" name="id" required type="text" id="id" onfocus="focusMethod(this)"placeholder="Escribe el ID correspondiente y da enter">
		</form>
		<br><br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Especialidad</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Total</th>
					<th>Quitar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($_SESSION["carrito"] as $indice => $producto){
						$granTotal += $producto->total;
					?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->especialidad ?></td>
					<td><?php echo $producto->nomp ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo $producto->cantidad ?></td>
					<td><?php echo $producto->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<h3>Total: <?php echo $granTotal; ?></h3>

<script>
function a(){
	var c=document.getElementById('curp').value;
	n=c.length;
if(n==0){
var am=prompt("Ingrese nuevamente su curp, para poder realizar su compra");
document.getElementById('curp').value=am;}
}
</script>
     	<form action="./terminarVenta.php" method="POST">
		  <input name="curp" type="hidden" id="curp" name"curp" required>
			<input name="total" type="hidden" value="<?php echo $granTotal;?>" required>
			<button type="submit" class="btn btn-success" onclick="a()">Ir a pagar</button>
			<a href="./cancelarVenta.php" class="btn btn-danger">Cancelar compra</a>
			<a class="btn btn-success" href="../">Salir</a>
		</form>


	</div>
