<?php
include("seguridad/seguridadVendedor.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section class="secciones-editables">

    <?php

    try{
    
	    $ID_codigoCategoria= $_GET["ID_codigoCategoria"];
	    $descripcionCategoria= $_GET["descripcionCategoria"];
	    $activo= $_GET["activo"];
	    //$ID_categoriaPadre= $_GET["ID_categoriaPadre"];
	    

	    // Creo la conexión
	    $conexion= conectar();

	    // Creo la instrucción SQL que en este caso es un UPDATE en la tabla clientes.		
		$sql= "UPDATE categorias SET ID_codigoCategoria = :ID_codigoCategoria, descripcionCategoria = :descripcionCategoria, activo = :activo WHERE ID_codigoCategoria = :ID_codigoCategoria";

		// Preparo el resultado pasándole la consulta a la conexión. 
		$resultado= $conexion->prepare($sql);

		// Ejecuto el resultado pasándole en un array los parámetros
		$resultado->execute(array(":ID_codigoCategoria"=>$ID_codigoCategoria, ":descripcionCategoria"=>$descripcionCategoria, ":activo"=>$activo));


	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	};

    ?>

	<div id="caja_centrada">

	<br>
	<br>
	<br>

	<?php

	echo "<h2 span style='font-size: 24pt;'>La Categoría <b>" . $descripcionCategoria . "</b> con ID_email <b>" . $ID_codigoCategoria . "</b> <br><br>ha sido <br><br><b>MODIFICADO CORRECTAMENTE</b>.</h2>";

	echo "<br>";
	echo "<br>";
	echo "<br>";

	// Pongo el botón para volver a index.php
	echo "<button> <a href='gestionarCategorias.php'>Volver a Usuarios</a></button>";

	?>

	</div>

 </section>

<?php
include("includes/menuVendedor.php");
include("includes/pie.php");
?>
