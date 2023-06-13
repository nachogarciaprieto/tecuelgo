<?php
include("seguridad/seguridadVendedor.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section class="secciones-editables">

	<br>		
	<h1>GESTIONAR PEDIDOS</h1>
	<br>	

	<br>

		<table>

			<th>ID_codigoPedido</th><th>fechaPedido</th><th>estado</th><th>ID_email</th><th>EDITAR</th>
		
			<?php

			selectTodosPedidos();

			while($fila=$resultado->fetch()){

				echo "<tr>";
				echo "<td>" . $fila[0] . "</td>";
				echo "<td>" . $fila[1] . "</td>";
				echo "<td>" . $fila[2] . "</td>";
				echo "<td>" . $fila[3] . "</td>";


				echo "<td><button><a href='gestionarPedido.php?ID_codigoPedido=" . $fila[0] . "&estado=" . $fila[2] . "'><img src='img/editar.png'></a></button></td>";
				

				echo "</tr>";

			};

			?>

		</table>

	<br>
	<br>	


</section>

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>
