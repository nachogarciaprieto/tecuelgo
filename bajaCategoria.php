<?php
include("seguridad/seguridadAdministrador.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section class="secciones-editables">

	    <?php
	    
	    $ID_codigoCategoria= $_GET["ID_codigoCategoria"];
	    $nombre= $_GET["nombre"];

	    ?>

		<br>
		<br>
		<br>
		
		<h1 style="font-size: 24pt; color: #E64747;">¿ESTÁS SEGURO DE QUE QUIERES <br> ELIMINAR LA CATEGORÍA <b>
		<?php echo $nombre; ?>, CON CÓDIGO DE CATEGORÍA: <?php echo $ID_codigoCategoria; ?>?. Esta acción no podrá deshacerse.</b></h1>
		<br>
		<h2>Si eliminas esta categoría desde aquí<br> desaparecerá definitivamente de la base de datos<br> y de cualquier otro registro del que dependa.<br> Si no estás seguro mejor edita la categoría<br> y haz que esté inactivo en vez de eliminar. </h2>
		
	    <br>
	    <br>	    
		
	    <div id='paginacion'>
		<button><a href='eliminarCategoria.php?ID_codigoCategoria=<?php echo $ID_codigoCategoria;?>&nombre=<?php echo $nombre; ?>'>Eliminar Definitivamente</a></button>
		<br>
		<button><a href='editarCategorias.php'>Cancelar</a></button>

		</div>

		
</section>

<?php
include("includes/menuAdministrador.php");
include("includes/pie.php");
?>