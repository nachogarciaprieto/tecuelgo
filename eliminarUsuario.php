<?php
include("seguridad/seguridadAdministrador.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>
<section>

	    <?php

	    try{

	    $conexion= conectar();
	    $ID_email= $_GET["ID_email"];
	    $nombre= $_GET["nombre"];	
		$sql= "DELETE FROM usuarios WHERE ID_email = :ID_email";
		$resultado= $conexion->prepare($sql);
		$resultado->execute(array(":ID_email" => $ID_email));

		}catch(Exception $e){

			die('Error: ' . $e->GetMessage());

		};
		
	    ?>



		<br>
		<br>
		<br>

		<?php

		// Mensaje de eliminado correctamente.
		echo "<h2><span style='font-size: 24pt;'>El Cliente <b>" . $nombre . "</b>,<br><br>con email <b>" . $ID_email . "</b>,<br><br> ha sido <b>ELIMINADO CORRECTAMENTE</b>.</h2>";

		echo "<br>";
		echo "<br>";
		echo "<br>";

		// Pongo el botón para volver a index.php
		echo "<button> <a href='editarUsuarios.php'>Volver a Usuarios</a></button>";

		?>

	

</section>

<?php
include("includes/menuVendedor.php");
include("includes/pie.php");
?>