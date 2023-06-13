<?php




	$totalArticulos= $_GET["totalArticulos"];

	
       $_COOKIE["totalArticulos"]= $totalArticulos; 
       $_COOKIE["totalPrecio"]= $totalPrecio;

	$value= $_GET["value"];
	$fila[0]= $_GET["referencia"];

	$_COOKIE["totalArticulos"]= $value;


	header("Location: verCarrito.php?value=$value&referencia=$fila[0]&totalArticulos=$totalArticulos");



?>
