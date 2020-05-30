<!DOCTYPE html>
<html>
<head>


<script type="text/javascript">
function validarInput(input) {
	var curp = input.value.toUpperCase(),
    	resultado = document.getElementById("resultado"),
        valido = "No válido";

    if (curpValida(curp)) {
    	valido = "Válido";
        resultado.classList.add("ok");
    } else {
    	resultado.classList.remove("ok");
    }

    resultado.innerText = "CURP: " + curp + "\nFormato: " + valido;
}

function curpValida(curp) {
	var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0\d|1[0-2])(?:[0-2]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
    	validado = curp.match(re);

    if (!validado)  //Coincide con el formato general?
    	return false;

    //Validar que coincida el dígito verificador
    function digitoVerificador(curp17) {
        //Fuente https://consultas.curp.gob.mx/CurpSP/
        var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
            lngSuma      = 0.0,
            lngDigito    = 0.0;
        for(var i=0; i<17; i++)
            lngSuma= lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
        lngDigito = 10 - lngSuma % 10;
        if(lngDigito == 10)
            return 0;
        return lngDigito;
    }
    if (validado[2] != digitoVerificador(validado[1]))
    	return false;

	return true; //Validado
}



	  	</script>
<script type="text/javascript">

function focusMethod(x){
                  x.style.color="black";
                  x.style.backgroundColor="#2CE1D4";

    x.style.fontfamily="Ar Christy";
              }
          </script>
		<p>
	<title>Registrar usuario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/estil.css">
</head>
<body>
<?php
        include("registrar.php");
        ?>
				<div>
    <form method="post">
    	<h1>¡Registrarse!</h1>
    	<input type="text" name="curp"onfocus="focusMethod(this)" required placeholder="Clave curp" onInput="validarInput(this)"  maxlength="18"  minlength="18">
             <pre id="resultado"></pre>
<input name="nombre" type="text" id="nombre" required placeholder="Nombres">
<input name="apellido" type="text" id="apellido" required placeholder="Apellido paterno">
<input name="fena" type="date" id="fena" required placeholder="Fecha de Nacimiento">
         <label><input type="radio" name="genero" id="genero" value="M" required=true> Masculino</label>

         <label><input type="radio" name="genero" id="genero" value="F" required=true> Femenino</label>

<input name="calles" type="text" id="calles" required placeholder="Calles">
<input name="num" type="number" id="num" required placeholder="Num. In">

<input name="telefono" type="text" id="telefono" required pattern="[0-9]+"  minlength="10" maxlength="10"placeholder="Teléfono">
<input name="correo" type="email" id="correo" required placeholder="Correo">
<input type="password" name="contraseña" required placeholder="Password" minlength="8" maxlength="20" >
    	<input type="submit" name="register">
    </form></div>

</body>
</html>
