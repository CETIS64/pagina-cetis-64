<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<br><br><br><br>
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php" enctype="multipart/form-data">
		<script type="text/javascript">

		function focusMethod(x){
		                  x.style.color="black";
		                  x.style.backgroundColor="#2CE1D4";

		    x.style.fontfamily="Ar Christy";
		              }
		          </script>
<br><br>
		<label for="especialidad">Especialidad:</label>
		<select name="especialidad" required=true>
	              <option selected value="0">--Elije una opcion--</option>
	              <option value="Programación">Programación</option>
	              <option value="Mecánica">Mecánica</option>
	              <option value="Eléctricidad">Electricidad</option>
	              <option value="Construcción">Construcción</option>
	              <option value="Trabajo social">Trabajo Social</option>
	            </select><br>
                                     <label for="nomp">Nombre:</label>
		<input class="form-control" name="nomp" required type="text" id="nomp" placeholder="Escribe el nombre" onfocus="focusMethod(this)">

		<label for="descripcion">Descripción:</label>
		<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"></textarea>

		<label for="precioVenta">Precio de venta:</label>
		<input class="form-control" name="precioVenta" required type="number" id="precioVenta" placeholder="Precio de venta">

		<label for="precioCompra">Precio de elaboración:</label>
		<input class="form-control" name="precioCompra" required type="number" id="precioCompra" placeholder="Precio de compra">

		<label for="existencia">Cantidad:</label>
		<input class="form-control" name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia">
    <label for="img">Imagen:</label>
		 <input type="file" name="img" id="img"accept=".jpeg,.jpg,.png">
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
