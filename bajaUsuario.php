<?php
include("seguridad/seguridadAdministrador.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section>

	    <?php
	    
	    $ID_email= $_GET["ID_email"];
	    $nombre= $_GET["nombre"];

	    ?>

		<br>
		<br>
		<br>
		
		<h1 style="font-size: 24pt; color: #E64747;">¿ESTÁS SEGURO DE QUE QUIERES <br> ELIMINAR AL CLIENTE <b>
		<?php echo $nombre; ?></b>
		</h1>
		<br>

		
	    <br>
	    
		

		<a href='eliminarUsuario.php?ID_email=<?php echo $ID_email;?>&nombre=<?php echo $nombre; ?>'>Eliminar Definitivamente</a>
		<br>
		<a href='editarUsuarios.php'>Cancelar</a>

	

		
</section>

<?php
include("includes/menuAdministrador.php");
include("includes/pie.php");
?>