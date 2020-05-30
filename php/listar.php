<?php include_once "encabezado2.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<link rel="stylesheet" href="./css/fontawesome-all.min.css">
	<link rel="stylesheet" href="css/2.css">
	<link rel="stylesheet" href="css/estilo.css">
	<div class="col-xs-12">
		<h1>Productos</h1>
		<div>
			<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Especialidad</th>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>$$ elaboraci&oacute;n</th>
					<th>Precio de venta</th>
					<th>Cantidad</th>
                                                                                          <th>Imagen</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->especialidad ?></td>
					<td><?php echo $producto->nomp ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioCompra ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo $producto->existencia ?></td>
					<td><img src="<?php echo $producto->ruta ?>" width="80" height="80"/></td>



					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $producto->id?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $producto->id?>"><i class="fa fa-trash"></i></a></td>



				</tr>
				<?php } ?>
			</tbody>
		</table>
	<a class="btn btn-success" href="../">Salir</a>
	</div>
