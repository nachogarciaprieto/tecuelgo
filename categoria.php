<?php

if(!isset($_SESSION["autenticado"])){

	session_start();
};

include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section>

<br>

	<div class="div-categoria">

		<?php
				
		try{

			if (isset($_GET["ID_codigoCategoria"])){

				$ID_codigoCategoria= $_GET["ID_codigoCategoria"];

				//echo "CATEGORÍA " . $ID_codigoCategoria . "<br><br>";

				global $resultado;	
				global $total_articulos;

				$conexion= conectar();

				$sql= "SELECT COUNT(*) FROM articulos WHERE ID_codigoCategoria = :ID_codigoCategoria AND activo = 1";
				$resultado= $conexion->prepare($sql);
				$resultado->execute(array(":ID_codigoCategoria"=>$ID_codigoCategoria));

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


				$numero_filas= 6;					

				$sql= "SELECT * FROM articulos WHERE ID_codigoCategoria = :ID_codigoCategoria AND activo = 1 ORDER BY autor LIMIT $desplazamiento, $numero_filas";
				$resultado= $conexion->prepare($sql);
				$resultado->execute(array(":ID_codigoCategoria"=>$ID_codigoCategoria));


					//comprar();
				

				

				while($fila=$resultado->fetch()){

					echo   "<div class='div-producto'>"
					     . "<img src='img/productos/articulo_" . $fila[0] . ".png'><br><b>"
					     . $fila[1] . "</b><br><p style='font-style: italic;'>"
					     . $fila[2] . "</p><br><p style='font-size: 0.8em;'>"
					     . $fila[3] . "<br>"
					     . "<p style='text-align: right'>" . $fila[4] . " €</p><br>"
					     . "<button ><a href='compra.php?ID_articulo=" . $fila[0] . "&precioArticulo=" . $fila[4] . "'>AÑADIR AL CARRITO</a></button><br>"
						 //. $fila[0] .$fila[1]
						 . "</div>";


				};

			echo "</div><br>";
			echo "<div id='paginacion'>";

			if ($desplazamiento > 0) {

				$prev = $desplazamiento - $numero_filas;
				$url = $_SERVER["PHP_SELF"] . "?desplazamiento=$prev";
				echo "<br><br><button class='paginacion'><a href='" . $url . "&ID_codigoCategoria=" . $ID_codigoCategoria . "'>Página anterior</a></button>";
			};

			if ($total_articulos > ($desplazamiento + $numero_filas)) {

				$prox = $desplazamiento + $numero_filas;
				$url = $_SERVER["PHP_SELF"] . "?desplazamiento=$prox";
				echo "<button class='paginacion'><a href='" . $url . "&ID_codigoCategoria=" . $ID_codigoCategoria . "'>Próxima página</a></button></div>";
			};

			
			};

		}catch(Exception $e){

			die('Error: ' . $e->GetMessage());

		};

		?>

	</div>	

<br>


</section>

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>
