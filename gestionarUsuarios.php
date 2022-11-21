<?php

include("seguridad/seguridadVendedor.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");

//$ID_email= $_GET["ID_email"];


?>

<section>

	<br>		
	<h1><span style="font-size: 30pt;">MANTENIMIENTO DE USUARIOS</h1>
	<br>	
	<h2><span style="font-size: 25pt;">CLIENTES</h2>
	<br>

		<table>

			<th>ID_email</th><th>nombre</th><th>telefono</th><th>direccion</th><th>activoUsuario</th><th  style= "background-color: green;">EDITAR</th>
		
			<?php

			selectClientes();

			while($fila=$resultado->fetch()){

				echo "<tr>";
				echo "<td>" . $fila[0] . "</td>";
				
				echo "<td>" . $fila[2] . "</td>";
				echo "<td>" . $fila[3] . "</td>";
				echo "<td>" . $fila[4] . "</td>";
				//echo "<td>" . $fila[5] . "</td>";
				echo "<td>" . $fila[6] . "</td>";			

				echo "<td><a href='gestionarUsuario.php?ID_email=" . $fila[0] . "'><img src='img/editar.png'></a></td>";
				

				echo "</tr>";

			};

			?>

		</table>

	<br>
	<center><button> <a href="nuevoCliente.php">Nuevo Cliente</a></button></center>
	<br>
	<br>	
	<h2><span style="font-size: 25pt;">CONTACTOS VENDEDORES</h2>
	<br>

		<table>

			<th>ID_email</th><th>nombre</th><th>telefono</th><th>activoUsuario</th>

		<?php

		selectVendedores();

		while($fila=$resultado->fetch()){

			echo "<tr>";
			echo "<td>" . $fila[0] . "</td>";
			
			echo "<td>" . $fila[2] . "</td>";
			echo "<td>" . $fila[3] . "</td>";
			//echo "<td>" . $fila[4] . "</td>";
			//echo "<td>" . $fila[5] . "</td>";
			echo "<td>" . $fila[6] . "</td>";
			echo "</tr>";

		};

		?>

		</table>

	<br>
	<br>	
	<h2><span style="font-size: 25pt;">CONTACTOS ADMINISTRADORES</h2>
	<br>

		<table>

			<th>ID_email</th><th>nombre</th><th>telefono</th><th>activoUsuario</th>

		<?php

		selectAdministradores();

		while($fila=$resultado->fetch()){

			echo "<tr>";
			echo "<td>" . $fila[0] . "</td>";
			echo "<td>" . $fila[2] . "</td>";
			echo "<td>" . $fila[3] . "</td>";
			echo "<td>" . $fila[6] . "</td>";
			echo "</tr>";

		};

		?>

		</table>



</section>

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>
