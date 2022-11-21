<?php
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section>

<?php

try{

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
	    //Tengo que poner el resto de campos en blanco!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	    
		$conexion= conectar();
	    $sql = "INSERT INTO usuarios "
		. "(ID_email, password, nombre, telefono, direccion, tipoUsuario, activoUsuario)"
		. "VALUES "
		. "('$ID_email', '$password', '$nombre', '$telefono', '$direccion', '$tipoUsuario', '$activoUsuario')";
		$resultado= $conexion->prepare($sql);
		$resultado->execute(array($ID_email, $password, $nombre, $telefono, $direccion, $tipoUsuario, $activoUsuario));
	};

	if(isset($ID_email) && isset($password) && isset($nombre) && isset($telefono) && isset($direccion) && isset($tipoUsuario) && isset($activoUsuario)){
		
		echo "<br><br><h2><span style='font-size: 30pt;'>Hola <b>" 
			 . $ID_email . "</b><br><br>te has registrado con <b>ÉXITO<b>.</h2>";
	};

}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

};

?>
	<br>
	<br>
	<br>
	<h1 style="font-size: 30pt;">REGISTRO RÁPIDO</h1>
	<br>

</section>	

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>
