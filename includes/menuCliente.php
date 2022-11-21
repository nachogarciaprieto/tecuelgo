<aside>
				    	
	<div class="menu-usuarios">

		<?php
		
		if(isset($_GET["ID_email"])){

		$ID_email= $_GET["ID_email"];
		
		};
		
		?>	

		<div class="logueado">

			<img src="img/usuario_registrado.png">
			<br>
			<h3> LOGUEADO COMO CLIENTE.</h3>
		
		</div>

		<br>

<?php include("includes/menuMiCarrito.php"); ?>


		<p>MI PERFIL: </p>
		<?php
		echo '<p><button><a href="miPerfil.php">MI PERFIL</a></button></p>';
		?>
		<br>
		<br>

		<p>MIS PEDIDOS:  </p>
		<?php
		echo '<p><button><a href="misPedidos.php">MIS PEDIDOS</a></button></p>';
		?>

		<br>
		<br>

		<p>CERRAR SESIÓN: </p>
		<p><button><a href="seguridad/cerrarSesion.php">CERRAR SESIÓN</a></button></p>
		<br>


	</div>

</aside>