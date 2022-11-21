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
    
	    $ID_codigoArticulo= $_GET["ID_codigoArticulo"];
	    $autor= $_GET["autor"];
	    $titulo= $_GET["titulo"];
	    $descripcionArticulo= $_GET["descripcionArticulo"];
	    $precioArticulo= $_GET["precioArticulo"];
	    
	
	    $activo= $_GET["activo"];
	    $ID_codigoCategoria= $_GET["ID_codigoCategoria"];

	    // Creo la conexión
	    $conexion= conectar();

	    // Creo la instrucción SQL que en este caso es un UPDATE en la tabla clientes.		
		$sql= "UPDATE articulos SET ID_codigoArticulo = :ID_codigoArticulo, autor = :autor, titulo = :titulo, descripcionArticulo = :descripcionArticulo, precioArticulo = :precioArticulo, activo = :activo, ID_codigoCategoria = :ID_codigoCategoria WHERE ID_codigoArticulo = :ID_codigoArticulo";

		// Preparo el resultado pasándole la consulta a la conexión. 
		$resultado= $conexion->prepare($sql);

		// Ejecuto el resultado pasándole en un array los parámetros
		$resultado->execute(array(":ID_codigoArticulo"=>$ID_codigoArticulo, ":autor"=>$autor, ":titulo"=>$titulo, ":descripcionArticulo"=>$descripcionArticulo, ":precioArticulo"=>$precioArticulo, ":activo"=>$activo, ":ID_codigoCategoria"=>$ID_codigoCategoria));


	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	};

    ?>

	<div id="caja_centrada">

	<br>
	<br>
	<br>

	<?php

	echo "<h2><span style='font-size: 24pt;'>El Artículo <b>" . $titulo . "</b>,<br><br>con Código de Artículo:  <b>" . $ID_codigoArticulo . "</b>, <br><br>ha sido <b>MODIFICADO CORRECTAMENTE</b>.</h2>";

	echo "<br>";
	echo "<br>";
	echo "<br>";

	// Pongo el botón para volver a index.php
	echo "<button> <a href='editarArticulos.php?ID_codigoCategoria=" . $ID_codigoCategoria . "'>Volver a Articulos</a></button>";

	?>

	</div>

 </section>

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>
