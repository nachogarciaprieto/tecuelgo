<?php

if(!isset($_SESSION["autenticado"])){

	session_start();

};

// include o include_once con funciones.php ?
//include("seguridad/seguridad.php");
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


					//comprar();
				

				

				while($fila=$resultado->fetch()){

					echo   "<div class='div-articulo'>"
					     //. "<br>"
					     //. $fila[1] . "<br>"
					     
					     //. "Es una subcategoría de " . $fila[3] . "<br>"
					     . "<a href='categoria.php?ID_codigoCategoria=" . $fila[0] . "'><img src='img/categorias/categoria_" . $fila[0] . ".png'></a><br>"
						 
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

		?>

	</div>	

<br>	















	
			
</section>		    

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>