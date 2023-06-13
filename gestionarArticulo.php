<?php
include("seguridad/seguridadVendedor.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");

?>

<section class="secciones-editables">

		<!--
		Este script muestra un formulario con los campor rellenos con los datos del cliente
		que estamos modificando. Al pulsar en "Modifar", se envían los datos al script
		modificar.php que hace un UPDATE sobre el registro y da un mensaje de modificado correctamente.
		-->
		<br>
		<br>
		<br>
		<h1><span style="font-size: 30pt;">GESTIONAR ARTÍCULO</h1>
		<br>

		<?php
	    
	    try{

		    $ID_codigoArticulo= $_GET["ID_codigoArticulo"];
			$conexion= conectar();
		    $sql= "SELECT * FROM articulos WHERE ID_codigoArticulo = :ID_codigoArticulo";
			$resultado= $conexion->prepare($sql);
			$resultado->execute(array(":ID_codigoArticulo" => $ID_codigoArticulo));

			while($fila= $resultado->fetch()){

				$ID_codigoArticulo= $fila[0];
				$autor= $fila[1];
				$titulo= $fila[2];
				$descripcionArticulo= $fila[3];
				$precioArticulo= $fila[4];
				$activo= $fila[5];
				$ID_codigoCategoria= $fila[6];	

			}

		}catch(Exception $e){

			die('Error: ' . $e->GetMessage());

		};

	    ?>

		<div id="caja_centrada">

		<form  action="modificarArticuloVendedor.php" method="get" enctype="text/plain">

	    <fieldset>	    	
	    <legend><b>DATOS DEL ARTÍCULO</b></legend>
	    <br>
	    ID_codigoArticulo: <input type="text" name="ID_codigoArticulo" value="<?php echo $ID_codigoArticulo; ?>" readonly/>
	    <br>
	    <br>  
	    Autor: <input type="text" name="autor" value="<?php echo $autor; ?>" />
	    <br>
	    <br>
	    Título: <input type="text" name="titulo" value="<?php echo $titulo; ?>" />
	    <br>
	    <br>
	    Descripción: <textarea name="descripcionArticulo" rows="5" cols="32"> <?php echo $descripcionArticulo; ?> </textarea>
	    <br>
	    <br>
	    Precio: <input type="text" name="precioArticulo" value="<?php echo $precioArticulo; ?>" />
	    <br>
	    <br>  
	    Activo/Inactivo:
		<select name="activo">

			<option>1</option>
			<option>0</option>

		</select>
	    
	    <br>
	    <br>  
	    <input hidden type="text" name="ID_codigoCategoria" value="<?php echo $ID_codigoCategoria; ?>" />
	    <br>    
	    <br>

	    </fieldset>

	    <br>

	    <fieldset>
	    <legend><b>ACCIONES</b></legend>

	    <br>

	    <!-- 
	    Botón "Modificar" que envía los datos a modificar.php y
	    botón "Cancelar" que te reenvía a index.php
		-->
	    <p><input type="submit" value="Modificar" /></p>
	    <br>
	    <a href="gestionarArticulos.php?ID_codigoCategoria=<?php echo $ID_codigoCategoria; ?>"><input type="button" value="Cancelar"></a>
	    <br>
	    <br> 	    

		</fieldset>

	    <br>

	    </form>

	    <br>
	    
</section>

<?php
include("includes/menuVendedor.php");
include("includes/pie.php");
?>
