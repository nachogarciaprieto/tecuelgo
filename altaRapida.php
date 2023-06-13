<?php
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>



<?php

try{


	if($_GET["ID_email"]==""){

		echo "<section><br><h1>Hola</h1><br><b><h2>" 
		. $ID_email . "</h2></b></br><h1>No has introducido un email.</h1>
		<br>
		<h1>Prueba a intentar registrarte de nuevo introduciendo un email válido.<h1></section>";

	}else{


		if(isset($_GET["ID_email"]) & isset($_GET["password"])){

			$ID_email= $_GET["ID_email"];
	
			// Defino la cookie ID_email pues me hace falta en varias partes de la tienda
			// La defino aquí y en seguridad/control.php que son los registros posibles
			setcookie("ID_email", $ID_email, time()+10000000, "/");
	
	
			$password= $_GET["password"];
			// Relleno las variables $nombre, $telefono y $direccion con un string vacío.
			$nombre= "";
			$telefono= "";
			$direccion= "";	    
			// Obligo a que el tipo de usuario sea Cliente
			$tipoUsuario= 2;
			// Y le digo que está activo sino me pone por defecto 0
			// y lo registra desactivado y aparece como registrado al hacer loguin .
			$activoUsuario= 1;
			//Tengo que poner el resto de campos en blanco!!!!!!!!!
			
			$conexion= conectar();
			$sql = "INSERT INTO usuarios "
			. "(ID_email, password, nombre, telefono, direccion, tipoUsuario, activoUsuario)"
			. "VALUES "
			. "('$ID_email', '$password', '$nombre', '$telefono', '$direccion', '$tipoUsuario', '$activoUsuario')";
			$resultado= $conexion->prepare($sql);
			$resultado->execute(array($ID_email, $password, $nombre, $telefono, $direccion, $tipoUsuario, $activoUsuario));
		};
	
		if(isset($ID_email) && isset($password) && isset($nombre) && isset($telefono) && isset($direccion) && isset($tipoUsuario) && isset($activoUsuario)){
			
			echo "<section><br><h1>Hola</h1><br><b><h2>" 
				 . $ID_email . "</h2></b></br><h1>Te has registrado correctamente.</h1>
				 <br>
				 <h1>Puedes completar tu perfil cuando te loguees.<h1></section>";
		};	






	}



}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

};

?>


<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>
