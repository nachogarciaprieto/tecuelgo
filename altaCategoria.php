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

	if (isset($_POST["descripcionCategoria"]) && isset($_POST["activo"])){


	    $descripcionCategoria= $_POST["descripcionCategoria"];
	    $activo= $_POST["activo"];


		$conexion= conectar();
	    $sql = "INSERT INTO categorias "
		. "(descripcionCategoria, activo)"
		. "VALUES "
		. "('$descripcionCategoria', '$activo')";

		$resultado= $conexion->prepare($sql);

		$resultado->execute(array($descripcionCategoria, $activo));



		/*
		Capturo el último ID para renombrar la imagen al último id+1 para que coincida 
		con el id del nuevo artículo que va a crear a continuación.
		*/
		$ultimoIdArticulo= $conexion->lastInsertId();
		//echo $ultimoIdArticulo;


	};

	// Pongo un condicional para que sólo imprima el mensaje si se ha definido el cliente, de otra forma daría error al entrar en la página pues todavía no se ha creado las variables.
	// if(isset($fila[0])){
		
	// 	echo "<h2 style='font-size: 30pt;'>El Usuario <b>" . $descripcionCategoria . "</b><br>ha sido introducido con <b>ÉXITO</b>.</h2>";

	// };


	// Envío la imagen al servidor
		if (isset($_FILES["imagenCategoria"])){


			// Capturo el tipo de archivo.
			$tipoImagen= $_FILES["imagenCategoria"]["type"];
			// Capturo el tamaño en bytes del archivo.
			$tamanyoImagen= $_FILES["imagenCategoria"]["size"];
			// Capturo el directorio temporal del server.
			$nombreTemporal= $_FILES["imagenCategoria"]["tmp_name"];
			// Capturo el error.
			$error= $_FILES["imagenCategoria"]["error"];

			/*
			Hay que establecer 2 límites a las imágenes que se van a poder
			subir al servidor. 
			1º El tamaño de la imagen no puede ser excesivo.
			2º El tipo de archivo que está permitido.
			*/
			if ($tamanyoImagen<=1000000){

				if ($tipoImagen == "image/jpeg" || $tipoImagen =="image/jpg" || $tipoImagen == "image/png" || $tipoImagen == "image/gif"){


	// Le reasigno el nombre a la imagen para que sea con el id que acaba de crear.
			$_FILES["imagenCategoria"]["name"]= "categoria_" . $ultimoIdArticulo;
			// Capturo el nombre del archivo.
			$nombreImagen= $_FILES["imagenCategoria"]["name"];

			// Obtengo el formato quitandole image/ a la cadena que devuelve ["type"]
			$formato= substr($tipoImagen, 6);  // devuelve el tipo de archivo de imagen.

			// Declaro la carpeta destino de la imagen en el servidor
			$carpetaDestino= $_SERVER["DOCUMENT_ROOT"] . "/img/categorias/";
			// Hay que mover la imagen desde la carpeta temporal a la carpeta destino y asignarle
			move_uploaded_file($_FILES["imagenCategoria"]["tmp_name"], $carpetaDestino .  $nombreImagen . "." . $formato);

				}else{

					echo "<br><h2>Sólo puedes enviar <b>IMÁGENES</b>.<br>Formatos permitidos: jpeg, jpg, png, gif.</h2>";
				};

			}else{

				echo "<br><h2>La imagen pesa demasiado. Sólo imágenes de hasta 1 MB.</h2>";
			};
		};

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	};

	?>

	<br>
	<br>
	<br>
	<h1 style="font-size: 30pt;">categoria</h1>
	<br>

	<div id="caja_centrada">
	<!--
	Para guardar los datos que introduzca en el formulario,
	lo que hago es enviar por url todas las variables a este mismo script.
	Una vez se envían, también se reciben y lo que hago es capturarlas con $_POST
	-->
	<form  action="altaCategoria.php" method="post" enctype="multipart/form-data">

	<fieldset>	    	
	<legend><b>DATOS DEL CLIENTE</b></legend>
	<br>
	<p>Imagen: </p><input type="file" name="imagenCategoria" size="20" required />
	<br>
	<br>
	<p>Descripción: </p><input  type="text" name="descripcionCategoria"  />
	<br>	
	<br>
	<p>Activo/Desactivo: </p><input type="text" name="activo" value="1" />
	<br>
	
	</fieldset>

	<br>

	<fieldset>
	<legend><b>ACCIONES</b></legend>

	<br>

	<!-- Botones de Guardar, Borrar y Volver	-->
	<p><input type="submit" value="Guardar" /></p>
	<br>

	<a href="editarCategorias.php"><input type="button" value="Volver"></a>
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
