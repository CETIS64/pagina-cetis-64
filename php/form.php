<?php
               if (isset($_POST['register'])) {
            $noControl = $_POST["curp"];//Recibe el Numero de control que del cual se consultaran los datos
            $con = $_POST["contraseña"];
            include_once "base_de_datos.php";
              //Sentencias para verificar que usuario tiene ese numero de control
              $sentencia = $base_de_datos->prepare("SELECT * FROM clientes WHERE curp = ?;");
              $sentencia2 = $base_de_datos->prepare("SELECT * FROM clientes WHERE contraseña= ?;");
              //Se ejecutan las sentencias
              $sentencia->execute([$noControl]);
              $sentencia2->execute([$con]);
              //Se obtienen los datos de la bdd, de acuerdo a su numero de control
              $producto = $sentencia->fetch(PDO::FETCH_OBJ);
              $producto2 = $sentencia2->fetch(PDO::FETCH_OBJ);
                  if($producto === FALSE|| $producto2==FALSE){//Verifica si existe o no existe ese numero de control<?=
                    ?>


                    <h3 class="bad">¡Verifica tu clave y contraseña!</h3>
	                  <?php
                }else{
                  echo ' <script>alert("¡Bienvenido, cliente!");;window.location.href="vender.php"</script>';
                }
}
          ?>
