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

	if (isset($_POST["autor"]) && isset($_POST["titulo"]) && isset($_POST["descripcionArticulo"]) && isset($_POST["precioArticulo"]) && isset($_POST["activo"]) && isset($_POST["nombreCategoria"])){

	    $autor= $_POST["autor"];
	    $titulo= $_POST["titulo"];
	    $descripcionArticulo= $_POST["descripcionArticulo"];
	    $precioArticulo= $_POST["precioArticulo"];	  	    
	    $activo= $_POST["activo"];
	    $nombreCategoria= $_POST["nombreCategoria"];		

		$conexion= conectar();				

				$sql= "SELECT ID_codigoCategoria FROM categorias WHERE descripcionCategoria = :nombreCategoria";
				$resultado= $conexion->prepare($sql);
				$resultado->execute(array(":nombreCategoria"=>$nombreCategoria));


				while($fila=$resultado->fetch()){

					$ID_codigoCategoria= $fila[0];

				};	    

		$conexion= conectar();
	    $sql = "INSERT INTO articulos "
		. "(autor, titulo, descripcionArticulo, precioArticulo, activo, ID_codigoCategoria)"
		. "VALUES "
		. "('$autor', '$titulo', '$descripcionArticulo', '$precioArticulo', '$activo', '$ID_codigoCategoria')";


		$resultado= $conexion->prepare($sql);
		$resultado->execute(array($autor, $titulo, $descripcionArticulo, $precioArticulo, $activo, $ID_codigoCategoria));



		$ultimoIdArticulo= $conexion->lastInsertId();


	};

	// Pongo un condicional para que sólo imprima el mensaje si se ha definido el cliente, de otra forma daría error al entrar en la página pues todavía no se ha creado las variables.
	if(isset($ID_codigoArticulo)){
		
		echo "<h2 style='font-size: 30pt;'>El Usuario <b>" . $ID_codigoArticulo . "</b><br>ha sido introducido con <b>ÉXITO</b>.</h2>";

	};


	// Envío la imagen al servidor
		if (isset($_FILES["imagen"])){


			// Capturo el tipo de archivo.
			$tipoImagen= $_FILES["imagen"]["type"];
			// Capturo el tamaño en bytes del archivo.
			$tamanyoImagen= $_FILES["imagen"]["size"];
			// Capturo el directorio temporal del server.
			$nombreTemporal= $_FILES["imagen"]["tmp_name"];
			// Capturo el error.
			$error= $_FILES["imagen"]["error"];

			/*
			Hay que establecer 2 límites a las imágenes que se van a poder
			subir al servidor. 
			1º El tamaño de la imagen no puede ser excesivo.
			2º El tipo de archivo que está permitido.
			*/
			if ($tamanyoImagen<=1000000){

				if ($tipoImagen == "image/jpeg" || $tipoImagen =="image/jpg" || $tipoImagen == "image/png" || $tipoImagen == "image/gif"){


	// Le reasigno el nombre a la imagen para que sea con el id que acaba de crear.
			$_FILES["imagen"]["name"]= "articulo_" . $ultimoIdArticulo;
			// Capturo el nombre del archivo.
			$nombreImagen= $_FILES["imagen"]["name"];

			// Obtengo el formato quitandole image/ a la cadena que devuelve ["type"]
			$formato= substr($tipoImagen, 6);  // devuelve el tipo de archivo de imagen.

			// Declaro la carpeta destino de la imagen en el servidor
			$carpetaDestino= $_SERVER["DOCUMENT_ROOT"] . "/img/productos/";
			// Hay que mover la imagen desde la carpeta temporal a la carpeta destino y asignarle
			move_uploaded_file($_FILES["imagen"]["tmp_name"], $carpetaDestino .  $nombreImagen . "." . $formato);

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
	<h1><span style="font-size: 30pt;">AÑADIR ARTÍCULO</h1>
	<br>

	<div id="caja_centrada">
	<!--
	Para guardar los datos que introduzca en el formulario,
	lo que hago es enviar por url todas las variables a este mismo script.
	Una vez se envían, también se reciben y lo que hago es capturarlas con $_POST
	-->
	<form  action="altaArticulo.php" method="post" enctype="multipart/form-data">

	<fieldset>	    	
	<legend><b>DATOS DEL CLIENTE</b></legend>
	<br>
	<p>imagen: </p><input type="file" name="imagen" size="20" required />
	<br>
	<br>
	<p>Autor: </p><input type="text" name="autor" />
	<br>	
	<br>
	<p>Título: </p><input type="text" name="titulo" />
	<br>
	<br>
	<p>Descripción: </p><input type="text" name="descripcionArticulo" />
	<br>
	<br>
	<p>Precio: </p><input type="text" name="precioArticulo" required />
	<br>
	<br>  
	    Activo/Inactivo:
		<select name="activo">
			<option>1</option>
			<option>0</option>
				
		</select>

	<br>
	<br>  
	    Categoría:
		<select name="nombreCategoria">			

		<?php

		try{

			$conexion= conectar();				

			$sql= "SELECT * FROM categorias WHERE activo = 1 ORDER BY ID_codigoCategoria";
			$resultado= $conexion->prepare($sql);
			$resultado->execute(array());


			while($fila=$resultado->fetch()){

				$categoria= $fila[1];

				echo "<option>" . $fila[1] . "</option>";

			};

		}catch(Exception $e){

			die('Error: ' . $e->GetMessage());

		};

		?>
				
		</select>
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
	<a href="editarArticulos.php"><input type="button" value="Volver"></a>
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
