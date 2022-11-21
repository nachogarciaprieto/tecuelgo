<?php
include("seguridad/seguridadVendedor.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section>

    <?php

    try{
    
	    $ID_codigoPedido= $_GET["ID_codigoPedido"];
	    $fechaPedido= $_GET["fechaPedido"];
	    $estado= $_GET["estado"];
	    $ID_email= $_GET["ID_email"];
	  

	    // Creo la conexión
	    $conexion= conectar();

	    // Creo la instrucción SQL que en este caso es un UPDATE en la tabla clientes.		
		$sql= "UPDATE pedidos SET  fechaPedido = :fechaPedido, estado = :estado, ID_email = :ID_email WHERE ID_codigoPedido = :ID_codigoPedido";

		// Preparo el resultado pasándole la consulta a la conexión. 
		$resultado= $conexion->prepare($sql);

		// Ejecuto el resultado pasándole en un array los parámetros
		$resultado->execute(array(":fechaPedido"=>$fechaPedido, ":estado"=>$estado, ":ID_email"=>$ID_email, ":ID_codigoPedido"=>$ID_codigoPedido));


	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	};

    ?>

	<div id="caja_centrada">

	<br>
	<br>
	<br>

	<?php

	echo "<h2><span style='font-size: 24pt;'>El Pedido  <b>" . $ID_codigoPedido . "</b>,<br><br>con Usuario <b>" . $ID_email . "</b>, <br><br>ha sido <b>MODIFICADO CORRECTAMENTE</b>.</h2>";

	echo "<br>";
	echo "<br>";
	echo "<br>";

	// Pongo el botón para volver a index.php
	echo "<button> <a href='gestionarPedidos.php'>Volver a Usuarios</a></button>";

	?>

	</div>

 </section>

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>
