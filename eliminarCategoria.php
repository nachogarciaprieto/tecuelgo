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
	    $ID_codigoCategoria= $_GET["ID_codigoCategoria"];
	    $nombre= $_GET["nombre"];	
		$sql= "DELETE FROM categorias WHERE ID_codigoCategoria = :ID_codigoCategoria";
		$resultado= $conexion->prepare($sql);
		$resultado->execute(array(":ID_codigoCategoria" => $ID_codigoCategoria));

		}catch(Exception $e){

			die('Error: ' . $e->GetMessage());

		};
		
	    ?>

		<br>
		<br>
		<br>

		<?php

		// Mensaje de eliminado correctamente.
		echo "<h2><span style='font-size: 24pt;'>La Categoría <b>" . $nombre . "</b>,<br><br>con Código de Categoría <b>" . $ID_codigoCategoria . "</b>,<br><br> ha sido <b>ELIMINADA DEFINITIVAMENTE DE LA BASE DE DATOS.</b></h2>";

		echo "<br>";
		echo "<br>";
		echo "<br>";

		// Pongo el botón para volver a index.php
		echo "<button> <a href='editarCategorias.php'>Volver a Categorías</a></button>";

		?>
	

</section>

<?php
include("includes/menuAdministrador.php");
include("includes/pie.php");
?>