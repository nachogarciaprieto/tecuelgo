<aside>

<script>

function validarRegistro() {

    var password = document.getElementById('password').value;
    
    if (validarPassword(password)) {

        alert("Password Válido");
		return true;

    }else {

        alert("El password debe tener al menos una minúscula, una mayúscula, un número y un carácter especial, y entre 8 y 15 caracteres.");
        return false;
    }
}

function validarPassword(password) {

    var comprobar_password = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

    return comprobar_password.test(password);
}

</script>


		
	<div class="menu-usuarios">
		

		<?php

		//echo '<img src="img/usuario_noregistrado.png"><h3> ' + $nombre + '</h3>';

		if (isset($_GET["cerrarSesion"])){

			echo "Has cerrado sesión.<br>";
		};

		if (!isset($_GET["ID_email"])){

			echo "No estás logueado.";		
		};

		if(isset($_GET["errorLogin"])){

			echo "Nombre de usuario o contraseña erróneos.";
		};

		?>

<?php include("includes/menuMiCarrito.php"); ?>
	
		<br>

		<form  action="seguridad/control.php" method="get" enctype="text/plain">

			<div class="menucarrito">
			<div class="imagenytexto">LOGUÉATE   </div><div class="imagenytexto"><img src="../img/icono_loguearse.png" alt="icono loguearse"></div>
			</div>

			<input id="login_email" type="text" name="ID_email" placeholder="Introduce tu email"/> 
			<br><br><input id="login_password" type="password" name="password" placeholder="Introduce una contraseña"/>
			<br><br>
			<p><input id="login_submit" type="submit" value="LOGUEARME"/></p>
				
		</form>

    	<br>
		<br>
              
		<form onsubmit="return validarRegistro();" action="altaRapida.php" method="get" enctype="text/plain">
	
			<div class="menucarrito">
			<div class="imagenytexto">REGÍSTRATE   </div><div class="imagenytexto"><img src="../img/icono_registrarse.png" alt="icono registrarse"></div>
			</div>

			<input type="email"  id="ID_email" name="ID_email" placeholder="Introduce una contraseña">
			<br><br><input type="password" id="password" name="password" placeholder="Introduce una contraseña" required>
			<br><br>
			<input type="submit" value="REGISTRARME"/>

		</form>

	</div>

</aside>