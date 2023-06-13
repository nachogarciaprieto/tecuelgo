<nav id="menucategorias"> 

	<ul class="menucategorias" class="contenedor_menuCategorias">

		<?php
		//include("funciones.php");
			

		//$conexion= conectar();
	
	selectCategorias();

	while($fila=$resultado->fetch()){

		if ($fila[2] == 1){

		echo "<button><a href='categoria.php?ID_codigoCategoria=" . $fila[0] . "'>" . $fila[1] . "</a></button></div>";

		};

	};

		?>

	</ul>

</nav>

