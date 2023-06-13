<?php

include("../includes/funciones.php");

// IF de seguridad
if (!isset($_GET["ID_email"]) || !isset($_GET["password"])){

			$errorLogin= "error";			
			header("Location: ../index.php?errorLogin=$errorLogin");			
};

conectar();
selectPasswords();

$ID_email= $_GET["ID_email"];

// Defino la cookie ID_email pues me hace falta en varias partes de la tienda
// La defino aquí y en altaRapida.php que son los registros posibles
setcookie("ID_email", $ID_email, time()+10000000, "/");

$password= $_GET["password"];

// IF de seguridad
if ($ID_email != $fila[0] || $password != $fila[1] || $fila[6] != 1) {

	$errorLogin= "error";			
	header("Location: ../index.php?errorLogin=$errorLogin");

};

/*
Compruebo fila por fila los resultados y hago un switch para definir
el valor de $_SESSION para cada tipo de usuario ya sea administrador (0),
vendedor (1) o cliente (2)
*/
while($fila=$resultado->fetch()){

	if ($ID_email == $fila[0] && $password == $fila[1] && $fila[6] == 1) {

		$tipoUsuario= $fila[5];
		//echo $tipoUsuario;

		switch ($tipoUsuario) {

			case '0':
				
				session_start();
				$_SESSION["autenticado"]= "administrador";
				header("Location: ../index.php?ID_email=$ID_email&password=$password");
			
			break;

			case '1':
			
				session_start();
				$_SESSION["autenticado"]= "vendedor";
				header("Location: ../index.php?ID_email=$ID_email&password=$password");

			break;

			case '2':
				
				session_start();
				$_SESSION["autenticado"]= "cliente";
				header("Location: ../index.php?ID_email=$ID_email&password=$password");

			break;
		
			default:
			 
			 echo "nada por aquí, jaté";

			break;
		};

		//echo "contraseña correcta";

	} else {

		$errorLogin= "error";			
		header("Location: ../index.php?errorLogin=$errorLogin");

	};

};



?>
