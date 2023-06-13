<?php
include("seguridad/seguridadAdministrador.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");

?>

<section class="secciones-editables">

		<br>
		<br>
		<br>
		<h1><span style="font-size: 30pt;">EDITAR USUARIO</h1>
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

		<form  action="modificarUsuario.php" method="get" enctype="text/plain">

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
	    <br>  
	    Tipo de Usuario: <input type="text" name="tipoUsuario"value="<?php echo $tipoUsuario; ?>" />
	    <br>
	    <br>  
	    Activo/Inactivo: <input type="text" name="activoUsuario" value="<?php echo $activoUsuario; ?>" />
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
	    <a href="editarUsuarios.php"><input type="button" value="Cancelar"></a>
	    <br>
	    <br> 	    

		</fieldset>

	    <br>

	    </form>

	    <br>
	    
</section>

<?php
include("includes/menuAdministrador.php");
include("includes/pie.php");
?>
