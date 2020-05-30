<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">

function focusMethod(x){
                  x.style.color="black";
                  x.style.backgroundColor="#2CE1D4";

    x.style.fontfamily="Ar Christy";
              }
          </script>
		<p>
	<title>Ingresae usuario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/estil.css">
</head>
<body>
<?php include("form.php"); ?>
    <div><form method="post">
    	<h1>¡Ingresar!</h1>
    	<input type="text" name="curp"onfocus="focusMethod(this)" required placeholder="Clave curp" maxlength="18"  minlength="18">

<input type="password" name="contraseña" required placeholder="Password" minlength="8" maxlength="20" >
    	<input type="submit" name="register" value="Acceder">
    </form>
    <form action="index.php">
    <input type="submit" name="register" value="Registrase">
  </form>

</div>
</body>
</html>
