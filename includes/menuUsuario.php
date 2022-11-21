<aside>

<?php





if(isset($_SESSION["autenticado"])){


	$rolUsuario= $_SESSION["autenticado"];


		switch ($rolUsuario) {

			case 'administrador':

				include("includes/menuAdministrador.php");
				break;

			case 'vendedor':
				
				include("includes/menuVendedor.php");
				break;


			case 'cliente':
				
				include("includes/menuCliente.php");
				break;	
			
			default:
				echo "nada por aquí";
				echo "<p>Cerrar Sesión:</p><br><p><button><a href='seguridad/cerrarSesion.php'>CERRAR SESIÓN</a></button></p><br>";

				break;
		};

} else {

		include("includes/menuLogin.php");

	};

?>

</aside>