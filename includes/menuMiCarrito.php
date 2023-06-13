<?php

// Imprime el total de artículos.
if (isset($_COOKIE["totalArticulos"])){

	$totalArticulos= $_COOKIE["totalArticulos"];
	echo "Nº de Productos: <b>" . $totalArticulos . "</b><br><br>";
};

// Imprime el precio total.
if (isset($_COOKIE["totalPrecio"])){

	$totalPrecio= $_COOKIE["totalPrecio"];
	echo "Precio Total: <b>" . $totalPrecio . "</b><br><br>";

};

// Si el carrito está vacío muestra CARRITO VACÍO
// Si hay algo, muestra el botón VER MI CARRITO
if (isset($totalArticulos) && $totalArticulos <= 0){

	echo '<div class="menucarrito">';
	echo '<div class="imagenytexto">CARRITO VACÍO   </div> <img src="../img/icono_carrito_naranja.png" alt="icono carrito"></p>';
	echo "<br></div>";

}else{

	echo '<div class="menucarrito">';
	echo '<p><button><a href="verCarrito.php" class="imagenytexto">VER MI CARRITO   </a><a href="verCarrito.php" class="imagenytexto"><img src="../img/icono_carrito_naranja.png" alt="icono carrito"></a></button></p>';
	echo "<br></div>";

};

?>