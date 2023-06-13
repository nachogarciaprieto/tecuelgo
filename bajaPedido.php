<?php
include("seguridad/seguridadAdministrador.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section class="secciones-editables">

	    <?php
	    
	    $ID_codigoPedido= $_GET["ID_codigoPedido"];
	    $estado= $_GET["estado"];

	    ?>

		<br>
		<br>
		<br>
		
		<h1 style="font-size: 24pt; color: #E64747;">¿ESTÁS SEGURO DE QUE QUIERES <br> ELIMINAR EL PEDIDO <b>
		<?php echo $ID_codigoPedido ?></b>, CON ESTADO <?php echo $estado; ?>
		</h1>
		<br>

		
	    <br>
	    
		

		<a href='eliminarPedido.php?ID_codigoPedido=<?php echo $ID_codigoPedido;?>&estado=<?php echo $estado; ?>'>Eliminar Definitivamente</a>
		<br>
		<a href='editarPedidos.php'>Cancelar</a>

	

		
</section>

<?php
include("includes/menuAdministrador.php");
include("includes/pie.php");
?>