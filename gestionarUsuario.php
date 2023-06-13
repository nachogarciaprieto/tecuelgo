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
		<h1><span style="font-size: 30pt;">GESTIONAR USUARIO</h1>
		<br>

		<?php
	    
	    try{

		    $ID_email= $_GET["ID_email"];
			$conexion= conectar();
		    $sql= "SELECT * FROM usuarios WHERE ID_email = :ID_email";
			$resultado= $conexion->prepare($sql);
			$resultado->execute(array(":ID_email" => $ID_email));

			while($fila= $resultado->fetch()){

				$password= $fila[1];
				$nombre= $fila[2];
				$telefono= $fila[3];
				$direccion= $fila[4];
				$tipoUsuario= $fila[5];
				$activoUsuario= $fila[6];	

			}

		}catch(Exception $e){

			die('Error: ' . $e->GetMessage());

		};

	    ?>

		<div id="caja_centrada">

		<form  action="modificarUsuarioVendedor.php" method="get" enctype="text/plain">

	    <fieldset>	    	
	    <legend><b>DATOS DEL CLIENTE</b></legend>
	    <br>
	    ID_email: <input type="text" name="ID_email" value="<?php echo $ID_email; ?>" readonly/>
	    <br>
	    <br>  
	    Password: <input type="text" name="password" value="<?php echo $password; ?>" />
	    <br>
	    <br>
	    Nombre: <input type="text" name="nombre" value="<?php echo $nombre; ?>" />
	    <br>
	    <br>
	    Telefono: <input type="text" name="telefono" value="<?php echo $telefono; ?>" />
	    <br>
	    <br>
	    Dirección: <input type="text" name="direccion" value="<?php echo $direccion; ?>" />
	    <br>

		<input hidden type="text" name="tipoUsuario"value="<?php echo $tipoUsuario; ?>" />

		<br>  
	    Activo/Inactivo:
		<select name="activoUsuario">

			<option>1</option>
			<option>0</option>

		</select>
	    
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
	    <a href="gestionarUsuarios.php"><input type="button" value="Cancelar"></a>
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
