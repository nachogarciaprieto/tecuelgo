<?php
include("seguridad/seguridadAdministrador.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section>

	    <?php
	    
	    $ID_codigoArticulo= $_GET["ID_codigoArticulo"];
	    $nombre= $_GET["nombre"];

	    ?>

		<br>
		<br>
		<br>
		
		<h1 style="font-size: 24pt; color: #E64747;">¿ESTÁS SEGURO DE QUE QUIERES <br> ELIMINAR EL ARTÍCULO <b>
		<?php echo $nombre; ?>, CON CÓDIGO DE ARTÍCULO: <?php echo $ID_codigoArticulo; ?>?. Esta acción no podrá deshacerse.</b></h1>
		<br>
		<h2>Si eliminas el artículo desde aquí<br> desaparecerá definitivamente de la base de datos<br> y de cualquier otro registro del que dependa.<br> Si no estás seguro mejor edita el artículo<br> y haz que esté inactivo en vez de eliminar. </h2>

		
	    <br>
	    <br>
	    
		
	    <div id='paginacion'>
		<button><a href='eliminarArticulo.php?ID_codigoArticulo=<?php echo $ID_codigoArticulo;?>&nombre=<?php echo $nombre; ?>'>Eliminar Definitivamente</a></button>
		<br>
		<button><a href='editarArticulos.php?ID_codigoArticulo=<?php echo $ID_codigoArticulo;?>'>Cancelar</a></button>

		</div>

		
</section>

<?php
include("includes/menuAdministrador.php");
include("includes/pie.php");
?>