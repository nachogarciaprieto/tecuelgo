<?php
include("seguridad/seguridadAdministrador.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section>

	<br>		
	<h1><span style="font-size: 30pt;">MANTENIMIENTO DE CATEGORÍAS</h1>
	<br>	
	<h2><span style="font-size: 25pt;">CATEGORÍAS</h2>
	<br>

		<table>

			<th>ID_codigoCategoria</th><th>descripcionCategoria</th><th>activo</th><th  style= "background-color: green;">EDITAR</th><th style= "background-color: red;">BORRAR</th>
		
			<?php

			selectCategorias();

			while($fila=$resultado->fetch()){

				echo "<tr>";
				echo "<td>" . $fila[0] . "</td>";
				echo "<td>" . $fila[1] . "</td>";
				echo "<td>" . $fila[2] . "</td>";
				//echo "<td>" . $fila[3] . "</td>";
				
			

				echo "<td><a href='editarCategoria.php?ID_codigoCategoria=" . $fila[0] . "'><img src='img/editar.png'></a></td>";
				echo "<td><button> <a href='bajaCategoria.php?ID_codigoCategoria=" . $fila[0] . "&nombre=" . $fila[1] . "'><img src='img/eliminar.png?dni'></a></button></td>";

				echo "</tr>";

			};

			?>

		</table>


	<br>
	<center><button> <a href="altaCategoria.php">Nueva Categoría</a></button></center>
	<br>
	<br>	
<br>
			
</section>

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>
