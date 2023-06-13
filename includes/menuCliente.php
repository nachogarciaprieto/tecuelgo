<aside>
				    	
	<!--<div class="menu-usuarios">-->

		<?php
		
		if(isset($_GET["ID_email"])){

		$ID_email= $_GET["ID_email"];
		
		};
		
		?>	
				
		

<?php include("includes/menuMiCarrito.php"); ?>

		
		
		<div class="menucarrito">
		<p><a id="miPerfil" href="miPerfil.php" class="imagenytexto">MI PERFIL   </a><a href="miPerfil.php" class="imagenytexto"><img src="../img/icono_perfil.png" alt="icono perfil"></a></p>
		<br></div>


		<div class="menucarrito">
		<p><a href="misPedidos.php" class="imagenytexto">MIS PEDIDOS   </a><a href="misPedidos.php" class="imagenytexto"><img src="../img/icono_pedidos.png" alt="icono pedidos"></a></p>
		<br></div>

		<div class="menucarrito">
		<p><a id="cerrarSesion" href="seguridad/cerrarSesion.php" class="imagenytexto">CERRAR SESIÓN   </a><a href="seguridad/cerrarSesion.php" class="imagenytexto"><img src="../img/icono_cerrar_sesion.png" alt="icono cerrar sesion"></a></p>
		<br></div>

		
	<!--</div>-->

</aside>