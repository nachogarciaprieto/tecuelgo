<?php
include("seguridad/seguridadAdministrador.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>
<section class="secciones-editables">

	    <?php

	    try{

	    $conexion= conectar();
	    $ID_codigoArticulo= $_GET["ID_codigoArticulo"];
	    $nombre= $_GET["nombre"];	
		$sql= "DELETE FROM articulos WHERE ID_codigoArticulo = :ID_codigoArticulo";
		$resultado= $conexion->prepare($sql);
		$resultado->execute(array(":ID_codigoArticulo" => $ID_codigoArticulo));

		}catch(Exception $e){

			die('Error: ' . $e->GetMessage());

		};
		
	    ?>



		<br>
		<br>
		<br>

		<?php

		// Mensaje de eliminado correctamente.
		echo "<h2><span style='font-size: 24pt;'>El Artículo <b>" . $nombre . "</b>,<br><br>con Código de Artículo <b>" . $ID_codigoArticulo . "</b>,<br><br> ha sido <b>ELIMINADO DEFINITIVAMENTE DE LA BASE DE DATOS.</b></h2>";

		echo "<br>";
		echo "<br>";
		echo "<br>";

		// Pongo el botón para volver a index.php
		echo "<button> <a href='editarArticulos.php'>Volver a Artículos</a></button>";

		?>

	

</section>

<?php
include("includes/menuAdministrador.php");
include("includes/pie.php");
?>