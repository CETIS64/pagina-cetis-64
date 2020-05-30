<?php

include("con_db.php");

   if (isset($_POST['register'])) {
    if (strlen($_POST['curp']) >= 1 && strlen($_POST['correo']) >= 1) {
	    $curp = trim($_POST['curp']);
	    $nombre = trim($_POST['nombre']);
                      $apellido= trim($_POST['apellido']);
	    $fena= trim($_POST['fena']);
                      $genero = trim($_POST['genero']);
	    $calles= trim($_POST['calles']);
	    $num = trim("num");
                      $telefono = trim($_POST['telefono']);
	    $correo= trim($_POST['correo']);
                      $contraseña= trim($_POST['contraseña']);

                     $sql4="select * from clientes where curp = '$curp'";
                     $ejecuta = mysqli_query($conex,$sql4);
                    $numero_filas = mysqli_num_rows($ejecuta);
                    if($numero_filas == 1){
?>
                              <h3 class="bad">¡Ya existe alguien con esa clave curp!</h3>
                                 <?php
	                    } else {
	    $consulta = "INSERT INTO clientes (curp, nombre, apellido, fena, genero, calles, num, telefono, correo, contraseña) VALUES ('$curp','$nombre','$apellido','$fena','$genero','$calles','$num','$telefono','$correo','$contraseña')";
	    $resultado = mysqli_query($conex,$consulta);
	    if ($resultado) {
	    	?>
	    	<h3 class="ok">¡Te has inscripto correctamente!</h3>
                                 <script>;window.location.href="vender.php"</script>
           <?php

 }else {
	    	?>
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
}
}
}
?>
