<?php
include("funciones.php");
include("cabecera.php");
include("menuPrincipal.php");
include("menuCategorias.php");
?>

<section class="secciones-editables">

	<br>		
	<h1><span style="font-size: 30pt;">MANTENIMIENTO DE USUARIOS</h1>
	<br>	
	<h2><span style="font-size: 25pt;">CLIENTES</h2>
	<br>

		<table>

			<th>ID_email</th><th>password</th><th>nombre</th><th>telefono</th><th>direccion</th><th>tipoUsuario</th><th>activoUsuario</th><th  style= "background-color: green;">EDITAR</th><th style= "background-color: red;">BORRAR</th>
		
			<?php

			selectClientes();

			while($fila=$resultado->fetch()){

				echo "<tr>";
				echo "<td>" . $fila[0] . "</td>";
				echo "<td>" . $fila[1] . "</td>";
				echo "<td>" . $fila[2] . "</td>";
				echo "<td>" . $fila[3] . "</td>";
				echo "<td>" . $fila[4] . "</td>";
				echo "<td>" . $fila[5] . "</td>";
				echo "<td>" . $fila[6] . "</td>";			

				echo "<td><a href='editarUsuario.php?ID_email=" . $fila[0] . "'><img src='img/editar.png'></a></td>";
				echo "<td><button> <a href='bajaUsuario.php?ID_email=" . $fila[0] . "&nombre=" . $fila[2] . "'><img src='img/eliminar.png?dni'></a></button></td>";

				echo "</tr>";

			};

			?>

		</table>

	<br>
	<center><button> <a href="altaCliente.php">Nuevo Cliente</a></button></center>
	<br>
	<br>	
	<h2><span style="font-size: 25pt;">VENDEDORES</h2>
	<br>

		<table>

			<th>ID_email</th><th>password</th><th>nombre</th><th>telefono</th><th>direccion</th><th>tipoUsuario</th><th>activoUsuario</th><th  style= "background-color: green;">EDITAR</th><th style= "background-color: red;">BORRAR</th>

		<?php

		selectVendedores();

		while($fila=$resultado->fetch()){

			echo "<tr>";
			echo "<td>" . $fila[0] . "</td>";
			echo "<td>" . $fila[1] . "</td>";
			echo "<td>" . $fila[2] . "</td>";
			echo "<td>" . $fila[3] . "</td>";
			echo "<td>" . $fila[4] . "</td>";
			echo "<td>" . $fila[5] . "</td>";
			echo "<td>" . $fila[6] . "</td>";			

			echo "<td><a href='editarUsuario.php?ID_email=" . $fila[0] . "'><img src='img/editar.png'></a></td>";
			echo "<td><button> <a href='bajaUsuario.php?ID_email=" . $fila[0] . "&nombre=" . $fila[2] . "'><img src='img/eliminar.png?dni'></a></button></td>";

			echo "</tr>";

		};

		?>

		</table>

		<br>
		<center><button> <a href="altaVendedor.php">Nuevo Vendedor</a></button></center>
		<br>
		<br>

			<h2><span style="font-size: 25pt;">ADMINISTRADORES</h2>
	<br>

		<table>

			<th>ID_email</th><th>password</th><th>nombre</th><th>telefono</th><th>direccion</th><th>tipoUsuario</th><th>activoUsuario</th><th  style= "background-color: green;">EDITAR</th><th style= "background-color: red;">BORRAR</th>

		<?php

		selectAdministradores();

		while($fila=$resultado->fetch()){

			echo "<tr>";
			echo "<td>" . $fila[0] . "</td>";
			echo "<td>" . $fila[1] . "</td>";
			echo "<td>" . $fila[2] . "</td>";
			echo "<td>" . $fila[3] . "</td>";
			echo "<td>" . $fila[4] . "</td>";
			echo "<td>" . $fila[5] . "</td>";
			echo "<td>" . $fila[6] . "</td>";			

			echo "<td><a href='editarUsuario.php?ID_email=" . $fila[0] . "'><img src='img/editar.png'></a></td>";
			echo "<td><button> <a href='bajaUsuario.php?ID_email=" . $fila[0] . "&nombre=" . $fila[2] . "'><img src='img/eliminar.png?dni'></a></button></td>";

			echo "</tr>";

		};

		?>

		</table>

		<br>
		<center><button> <a href="altaAdministrador.php">Nuevo Vendedor</a></button></center>
		<br>
		<br>

</section>

<?php
include("menuAdministrador.php");
include("pie.php");
?>
