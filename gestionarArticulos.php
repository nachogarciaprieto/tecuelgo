<?php
include("seguridad/seguridadVendedor.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section class="secciones-editables">

	<br>		
	<h1>EDITAR ARTÍCULOS</h1>
	<br>	


<?php

if (!isset($_GET["ID_codigoCategoria"])){

	echo "<h2>ELIGE UNA CATEGORÍA<br> PARA EDITAR SUS ARTÍCULOS<br> O AÑADIR NUEVOS ARTÍCULOS.</h2><br>";
	echo "<br><div class='div-categoria'>";
		
		try{

				global $resultado;	
				global $total_articulos;

				$conexion= conectar();

				$sql= "SELECT COUNT(*) FROM categorias WHERE activo = 1";
				$resultado= $conexion->prepare($sql);
				$resultado->execute(array());

				while($fila=$resultado->fetch()){

					// Total artículos de esa categoría.
					
					$total_articulos= $fila[0];

					//echo $total_articulos;

				};			

				if (isset($_GET["desplazamiento"])){

					$desplazamiento = $_GET["desplazamiento"];

				}else{
					
					$desplazamiento = 0;
				};

				$numero_filas= 3;					

				$sql= "SELECT * FROM categorias WHERE activo = 1 ORDER BY ID_codigoCategoria LIMIT $desplazamiento, $numero_filas";
				$resultado= $conexion->prepare($sql);
				$resultado->execute(array());


				while($fila=$resultado->fetch()){

					echo   "<div class='div-articulo'>"
					     //. "<br>"
					     //. $fila[1] . "<br>"
					     
					     //. "Es una subcategoría de " . $fila[3] . "<br>"
					     . "<a href='gestionarArticulos.php?ID_codigoCategoria=" . $fila[0] . "'><img src='img/categorias/categoria_" . $fila[0] . ".png'></a><br>"
						 
						 . "</div>";

				};

			echo "</div><br>";
			echo "<div id='paginacion'>";

			if ($desplazamiento > 0) {

				$prev = $desplazamiento - $numero_filas;
				$url = $_SERVER["PHP_SELF"] . "?desplazamiento=$prev";
				echo "<br><br><button class='paginacion'><a href='" . $url . "'>Página anterior</a></button>";
			};

			if ($total_articulos > ($desplazamiento + $numero_filas)) {

				$prox = $desplazamiento + $numero_filas;
				$url = $_SERVER["PHP_SELF"] . "?desplazamiento=$prox";
				echo "<button class='paginacion'><a href='" . $url . "'>Próxima página</a></button></div>";
			};

			
			}catch(Exception $e){

			die('Error: ' . $e->GetMessage());

		};

		echo "</div><br>";

}else{

	// Obtengo el nombre de la categoría
	$ID_codigoCategoria= $_GET["ID_codigoCategoria"];

	nombreCategoria($ID_codigoCategoria);

	while($fila=$resultado->fetch()){

		//$nombreCategoria= $fila[2];

	echo "<h2>Estás viendo los Artículos<br>de la Categoría: <b>" . $fila[0] . "</b></h2><br>";
	echo "<br><div class='div-categoria'>";

	};

	echo "<table>

			<th>ID_codigoArticulo</th><th>AUTOR</th><th>TITULO</th><th>DESCRIPCIÓN</th><th>PRECIO</th><th>ACTIVO</th><th>EDITAR</th>";

			selectArticulosCategoria($ID_codigoCategoria);

			while($fila=$resultado->fetch()){

				if ($fila[5] == 1) {

					$fila[5] = "Activo";

				}elseif ($fila[5] == 0) {
					
					$fila[5] = "Desactivo";

				};

				echo "<tr>";
				echo "<td>" . $fila[0] . "</td>";
				echo "<td>" . $fila[1] . "</td>";
				echo "<td>" . $fila[2] . "</td>";
				echo "<td style='font-size: 0.8em'>" . $fila[3] . "</td>";
				echo "<td>" . $fila[4] . "</td>";
				echo "<td>" . $fila[5] . "</td>";
							

				echo "<td><button><a href='gestionarArticulo.php?ID_codigoArticulo=" . $fila[0] . "'><img src='img/editar.png'></a></button></td>";

				echo "</tr>";

			};

		echo "</table>
		<button><a href='altaArticuloVendedor.php?ID_codigoCategoria=$ID_codigoCategoria'>NUEVO ARTÍCULO</a></button>
		
		<button> <a href='gestionarArticulos.php'>ELEGIR OTRA CATEGORÍA</a></button>";	
};

?>

</section>

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>
