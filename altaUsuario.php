<?php
include("seguridad/seguridadAdministrador.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section class="secciones-editables">

	<?php

	try{

	if(isset($_GET["ID_email"]) && isset($_GET["password"]) && isset($_GET["nombre"]) && isset($_GET["telefono"]) && isset($_GET["direccion"]) && isset($_GET["tipoUsuario"]) && isset($_GET["activoUsuario"])){

	    // Capturo en variables los argumentos pasados por url con $_GET.
	    $ID_email= $_GET["ID_email"];
	    $password= $_GET["password"];
	    $nombre= $_GET["nombre"];
	    $telefono= $_GET["telefono"];
	    $direccion= $_GET["direccion"];	  	    
	    $tipoUsuario= $_GET["tipoUsuario"];
	    $activoUsuario= $_GET["activoUsuario"];

		$conexion= conectar();
	    $sql = "INSERT INTO usuarios "
		. "(ID_email, password, nombre, telefono, direccion, tipoUsuario, activoUsuario)"
		. "VALUES "
		. "('$ID_email', '$password', '$nombre', '$telefono', '$direccion', '$tipoUsuario', '$activoUsuario')";

		/*
		Creo el objeto de tipo PDOStatement que devuelve una tabla virtual con los resultados.
		Para crear este objeto utilizo el método prepare() que además evita la inyección de sql.
		Se le pasa como variable la consulta $sql, devuelve el resultado de la query
		y la almaceno en una variable $resultado.
		*/
		$resultado= $conexion->prepare($sql);

		/*
		Despues de crear el objeto con el resultado hay que llamar a la función execute().
		Esta función pasa los parámetros que queramos en forma de array a la consulta.
		*/
		$resultado->execute(array($ID_email, $password, $nombre, $telefono, $direccion, $tipoUsuario, $activoUsuario));

	};

	// Pongo un condicional para que sólo imprima el mensaje si se ha definido el cliente, de otra forma daría error al entrar en la página pues todavía no se ha creado las variables.
	if(isset($ID_email)){
		
		echo "<h2 style='font-size: 30pt;'>El Usuario <b>" . $ID_email . "</b><br>ha sido introducido con <b>ÉXITO</b>.</h2>";

	};

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	};

	?>

	<br>
	<br>
	<br>
	<h1><span style="font-size: 30pt;">AÑADIR USUARIO</h1>
	<br>

	<div id="caja_centrada">
	<!--
	Para guardar los datos que introduzca en el formulario,
	lo que hago es enviar por url todas las variables a este mismo script.
	Una vez se envían, también se reciben y lo que hago es capturarlas con $_GET
	-->
	<form  action="altaUsuario.php" method="get" enctype="text/plain">

	<fieldset>	    	
	<legend><b>DATOS DEL CLIENTE</b></legend>
	<br>
	<p>ID_email: </p><input type="text" name="ID_email"/>
	<br>
	<br>
	<p>Password: </p><input type="text" name="password"/>
	<br>	
	<br>
	<p>Nombre: </p><input type="text" name="nombre"/>
	<br>
	<br>
	<p>Teléfono: </p><input type="text" name="telefono"/>
	<br>
	<br>
	<p>Dirección: </p><input type="text" name="direccion"/>
	<br>
	<br>  
	<p>Tipo de Usuario: </p><input type="text" name="tipoUsuario"/>
	<br>
	<br>  
	<p>Activado: </p><input type="text" name="activoUsuario"/>
	<br>

	</fieldset>

	<br>

	<fieldset>
	<legend><b>ACCIONES</b></legend>

	<br>

	<!-- Botones de Guardar, Borrar y Volver	-->
	<p><input type="submit" value="Guardar" /></p>
	<br>
	<p><input type="reset" value="Borrar Datos" /></p>
	<br>
	<a href="editarUsuarios.php"><input type="button" value="Volver"></a>
	<br>


	</fieldset>

	<br>

	</form>

	</div>


</section>	

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>
