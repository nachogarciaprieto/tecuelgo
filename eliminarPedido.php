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
	    $ID_codigoPedido= $_GET["ID_codigoPedido"];
	    $estado= $_GET["estado"];	
		$sql= "DELETE FROM pedidos WHERE ID_codigoPedido = :ID_codigoPedido";
		$resultado= $conexion->prepare($sql);
		$resultado->execute(array(":ID_codigoPedido" => $ID_codigoPedido));

		}catch(Exception $e){

			die('Error: ' . $e->GetMessage());

		};
		
	    ?>



		<br>
		<br>
		<br>

		<?php

		// Mensaje de eliminado correctamente.
		echo "<h2><span style='font-size: 24pt;'>El Pedido <b>" . $ID_codigoPedido . "</b>,<br><br>ha sido ELIMINADO DE LA BASE DE DATOS.</b></h2>";

		echo "<br>";
		echo "<br>";
		echo "<br>";

		// Pongo el botón para volver a index.php
		echo "<button> <a href='editarPedidos.php'>Volver a Pedidos</a></button>";

		?>

	

</section>

<?php
include("includes/menuAdministrador.php");
include("includes/pie.php");
?>