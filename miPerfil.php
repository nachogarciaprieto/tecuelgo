<?php
include("seguridad/seguridadCliente.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section class="secciones-editables">
	
	<h1>BIENVENIDO A TU PERFIL</h1>
	<br>	
	<h2>TUS DATOS</h2>
	<br>

		<table>

			<th>Email</th><th>Password</th><th>Nombre</th><th>Telefono</th><th>Dirección</th>
		
			<?php

			conectar();

			selectPerfil();

			while($fila=$resultado->fetch()){

				echo "<tr>";
				echo "<td>" . $fila[0] . "</td>";
				echo "<td>******</td>";
				echo "<td>" . $fila[2] . "</td>";
				echo "<td>" . $fila[3] . "</td>";
				echo "<td>" . $fila[4] . "</td>";				
				echo "</tr>";

			};

			?>

		</table>

		<br>
		<br>
		<h2>MODIFICA TUS DATOS</h2>
		<br>

		<?php
	    
	    try{

		    $ID_email= $_COOKIE["ID_email"];
			$conexion= conectar();
		    $sql= "SELECT * FROM usuarios WHERE ID_email = :ID_email";
			$resultado= $conexion->prepare($sql);
			$resultado->execute(array(":ID_email" => $ID_email));

			while($fila= $resultado->fetch()){

				$ID_email= $_COOKIE["ID_email"];
				$password= $fila[2];//$fila[1];
				$nombre= $fila[2];
				$telefono= $fila[3];
				$direccion= $fila[4];
			}

		}catch(Exception $e){

			die('Error: ' . $e->GetMessage());

		};

	    ?>

		<div id="caja_centrada">

		<div class="formulario">

		<form  action="modificarPerfil.php" method="get" enctype="text/plain">

	    <br>
	    <input hidden= "true" type="text" name="ID_email" value="<?php echo $ID_email; ?>" readonly />
  
	    Password: <input type="password" name="password" value="<?php echo $password; ?>" />
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
	    <br>

	    <input type="submit" value="Modificar" />
	    <br>
	    <br>

	    <br>

	    </form>
	</div>
	</div>

</section>

<?php
include("includes/menuCliente.php");
include("includes/pie.php");
?>
