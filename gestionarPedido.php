<?php
include("seguridad/seguridadVendedor.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section>

		<!--
		Este script muestra un formulario con los campor rellenos con los datos del cliente
		que estamos modificando. Al pulsar en "Modifar", se envían los datos al script
		modificar.php que hace un UPDATE sobre el registro y da un mensaje de modificado correctamente.
		-->
		<br>
		<br>
		<br>
		<h1 style="font-size: 30pt;">GESTIONAR PEDIDO.  </h1>
		<h2 style="font-size: 12pt;">Modifica el estado del pedido.  </h2>
		<br>

		<?php
	    
	    try{

		    $ID_codigoPedido= $_GET["ID_codigoPedido"];
		    $estado= $_GET["estado"];
			$conexion= conectar();
		    $sql= "SELECT * FROM pedidos WHERE ID_codigoPedido = :ID_codigoPedido";
			$resultado= $conexion->prepare($sql);
			$resultado->execute(array(":ID_codigoPedido" => $ID_codigoPedido ));

			while($fila= $resultado->fetch()){

				$ID_codigoPedido= $fila[0];
				$fechaPedido= $fila[1];
				$estado= $fila[2];
				$ID_email= $fila[3];
	

			}

		}catch(Exception $e){

			die('Error: ' . $e->GetMessage());

		};

	    ?>

		<div id="caja_centrada">

		<form  action="modificarPedidoVendedor.php" method="get" enctype="text/plain">

	    <fieldset>	    	
	    <legend><b>DATOS DEL CLIENTE</b></legend>
	    <br>
	    Código Pedido: <input type="text" name="ID_codigoPedido" value="<?php echo $ID_codigoPedido; ?>" readonly />
	    <br>
	    <br>  
	    Fecha del Pedido: <input type="text" name="fechaPedido" value="<?php echo $fechaPedido; ?>" readonly />
	    <br>
	    <br>
	    
	    <select name="estado" value="<?php echo $estado; ?>">
         <option>enpreparacion</option>
         <option>preparado</option>
         <option>enviado</option>
         <option>recibido</option>
       </select>
	    <br>
	    <br>
	    Usuario: <input type="text" name="ID_email" value="<?php echo $ID_email;  ?>" readonly />
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
	    <a href="editarPedidos.php"><input type="button" value="Cancelar"></a>
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
