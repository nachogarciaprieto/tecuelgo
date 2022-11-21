<?php

include("seguridad/seguridadCliente.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");

?>

<section>


	<?php

	if(!isset($_SESSION["autenticado"])){

	//session_start();

	echo "DEBES ESTAR LOGUEADO PARA VER TUS PEDIDOS.<br> SI NO TIENES CUENTA REGISTRATE EN UN SÓLO CLIC";

	}else{

		
	

	echo "<br><br>		
	<h1 style='font-size: 30pt;'>TUS PEDIDOS</h1>
	<br>
	<br>
	<table>

		<th>CÓDIGO DE TU PEDIDO</th><th>FECHA DEL PEDIDO</th><th>ESTADO DE TU PEDIDO</th><th  style= 'background-color: green;'>VER PEDIDO</th>";
		
			

		selectPedidos();

		while($fila=$resultado->fetch()){

			if($fila[2] == "enpreparacion"){

				$fila[2] = "En Preparación";
			};

			echo "<tr>";
			echo "<td>" . $fila[0] . "</td>";
			echo "<td>" . $fila[1] . "</td>";
			echo "<td>" . $fila[2] . "</td>";
			// echo "<td>" . $fila[3] . "</td>";
			
		

			echo "<td><a href='miPedido.php?ID_codigoPedido=" . $fila[0] . "'><img src='img/editar.png'></a></td>";
			
			echo "</tr>";
		};
		

	echo "</table>";





};
	
?>

</section>

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>
