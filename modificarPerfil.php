<?php
include("seguridad/seguridadCliente.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section class="secciones-editables">

    <?php

    try{
    
	    $ID_email= $_GET["ID_email"];
	    $password= $_GET["password"];
	    $nombre= $_GET["nombre"];
	    $telefono= $_GET["telefono"];
	    $direccion= $_GET["direccion"];
	    
	
	    //$tipoUsuario= $_GET["tipoUsuario"];
	    //$activoUsuario= $_GET["activoUsuario"];

	    // Creo la conexión
	    $conexion= conectar();

	    // Creo la instrucción SQL que en este caso es un UPDATE en la tabla clientes.		
		$sql= "UPDATE usuarios SET ID_email = :ID_email, password = :password, nombre = :nombre, telefono = :telefono, direccion = :direccion WHERE ID_email = :ID_email";

		// Preparo el resultado pasándole la consulta a la conexión. 
		$resultado= $conexion->prepare($sql);

		// Ejecuto el resultado pasándole en un array los parámetros
		$resultado->execute(array(":ID_email"=>$ID_email, ":password"=>$password, ":nombre"=>$nombre, ":telefono"=>$telefono, ":direccion"=>$direccion));


	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	};

    ?>

	<div id="caja_centrada">

	<br>
	<br>
	<br>

	<?php

	echo "<h2><span style='font-size: 24pt;'>El Cliente <b>" . $nombre . "</b>,<br><br>con Email <b>" . $ID_email . "</b>, <br><br>ha sido <b>MODIFICADO CORRECTAMENTE</b>.</h2>";

	echo "<br>";
	echo "<br>";
	echo "<br>";

	// Pongo el botón para volver a index.php
	echo "<button> <a href='miPerfil.php'>Volver a Usuarios</a></button>";

	?>

	</div>

 </section>

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>
