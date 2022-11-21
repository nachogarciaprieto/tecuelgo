<nav id="menucategorias"> 

	<ul class="menucategorias">

		<?php
		//include("funciones.php");
			

		//$conexion= conectar();
	
	selectCategorias();

	while($fila=$resultado->fetch()){

		if ($fila[2] == 1){

		echo "<div class='div_categoria'><button><a href='categoria.php?ID_codigoCategoria=" . $fila[0] . "'>" . $fila[1] . "</a></button></div>";

		};




	};


			// $resultado=5;
			// for($i=0; $i<=$resultado; $i++) {

			// 	echo "<li><a href='tecuelgo.com'>" . $i . "</a></li>";
			// };


		?>

		<!-- <li><a href="home.php">Categoría 1</a></li>
		<li><a href="about.php">Categoría 2</a></li>
		<li><a href="contact.php">Categoría 3</a></li>
		<li><a href="legal.php">Categoría 4</a></li>
		<li><a href="legal.php">Categoría 5</a></li> -->
	</ul>
     
</nav>

