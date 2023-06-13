<?php
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section class="secciones-editables">

	<br>		
	<h1><span style="font-size: 30pt">MI PERFIL</span></h1>
	<br>	
	<h2><span style="font-size: 25pt;">PEQUEÑO PONY</span></h2>
	<br>

		<table>

			<th>ID_email</th><th>password</th><th>nombre</th><th>telefono</th><th>direccion</th><th>tipoUsuario</th><th>activoUsuario</th><th  style= "background-color: green;">EDITAR</th><th style= "background-color: red;">BORRAR</th>
		
			<?php

			//selectClientes();
			selectUsuario();

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

</section>

<?php
include("includes/menuCliente.php");
include("includes/pie.php");
?>
