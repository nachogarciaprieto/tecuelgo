<?php

// // Imprime los el total de artículos.
// if (isset($totalArticulos)){

// 	echo "Nº de Productos: <b>" . $totalArticulos . "</b><br><br>";
// };

// // Imprime los el precio total.
// if (isset($totalPrecio)){

// 	echo "Precio Total: <b>" . $totalPrecio . "</b><br><br>";

// };

// // Si el carrito está vacío muestra CARRITO VACÍO
// // Si hay algo, muestra el botón VER MI CARRITO
// if (isset($totalArticulos) && $totalArticulos <= 0){

// 	echo "<h3>CARRITO VACÍO</h3>";	

// }else{

// 	echo '<p><button><a href="verCarrito.php">VER MI CARRITO</a></button></p>';
// 	echo "<br></div>";
// };


// Imprime los el total de artículos.
if (isset($_COOKIE["totalArticulos"])){

	$totalArticulos= $_COOKIE["totalArticulos"];
	echo "Nº de Productos: <b>" . $totalArticulos . "</b><br><br>";
};

// Imprime los el precio total.
if (isset($_COOKIE["totalPrecio"])){

	$totalPrecio= $_COOKIE["totalPrecio"];
	echo "Precio Total: <b>" . $totalPrecio . "</b><br><br>";

};

// Si el carrito está vacío muestra CARRITO VACÍO
// Si hay algo, muestra el botón VER MI CARRITO
if (isset($totalArticulos) && $totalArticulos <= 0){

	echo "<h3>CARRITO VACÍO</h3>";	

}else{

	echo '<p><button><a href="verCarrito.php">VER MI CARRITO</a></button></p>';
	echo "<br></div>";
};










?>