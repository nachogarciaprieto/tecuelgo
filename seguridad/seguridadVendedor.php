<?php

session_start();



if (!isset($_SESSION["autenticado"])){

	header("Location: ../index.php");

	exit();
};

if ($_SESSION["autenticado"]!="vendedor"){

	
	header("Location: cerrarSesion.php");

	exit();

}

//echo "seguridad Vendedor";
?>