<aside>

<!--  -->
			
	<div class="menu-usuarios">
		

		<?php

		echo '<img src="img/usuario_noregistrado.png"><h3><?php //echo  $nombre ?></h3>';

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

		<br>
		<br>


		
<?php include("includes/menuMiCarrito.php"); ?>



		<br>

    	<form  action="seguridad/control.php" method="get" enctype="text/plain">

	    	<fieldset>

			<legend>ENTRAR</legend>

		    	<p>email: <input type="text" name="ID_email"/> </p>
		    	<p>contraseña: <input type="password" name="password"/></p>
		    	<br>
		    	<p><input type="submit" value="LOGIN"/></p>
		    	
	    	</fieldset>

    	</form>

    	<br>

    	<form action="altaRapida.php" method="get" enctype="text/plain">

	    	<fieldset>

			<legend>REGISTRARME</legend>

		    	<p>mail: <input type="text" name="ID_email"/> </p>
		    	<p>contraseña: <input type="password" name="password"/></p>
		    	<br>
		    	<p><input type="submit" value="REGISTRARME"/></p>
		    	
	    	</fieldset>

    	</form>

    	<br>

    	<!-- <p>Cerrar Sesión: </p>
		<br>
		<p><button><a href="seguridad/cerrarSesion.php">CERRAR SESIÓN</a></button></p>
		<br> -->



	</div>

</aside>