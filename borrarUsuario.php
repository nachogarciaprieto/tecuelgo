<?php
include("funciones.php");
include("cabecera.php");
include("menuPrincipal.php");
include("menuCategorias.php");
?>

		<!--
		En esta página de borrarcliente.php va a ser una página de confirmación.
		Dará un aviso de si estás seguro de querer eliminar el registro y tendrá dos botones,
		uno para eliminar y otro para cancelar.
		-->

		<!--
		Recupero el dni en la variable $dni con el $_GET
	    -->
	    <?php
	    
	    $dni= $_GET["dni"];
	    $nombre= $_GET["nombre"];

	    ?>

		<br>
		<br>
		<br>
		<h2><span style="font-size: 24pt; color: #E64747;">¿ESTÁS SEGURO DE QUE QUIERES<br> ELIMINAR AL CLIENTE <b> <?php echo $nombre ?><b>?</h2>
		<br>

		<div id="caja_centrada">
		
	    <br>
	    <br>
		<br>

		<!--
		Creo un botón que redirigirá a eliminar.php pasando los parámetros $dni y $nombre.
		Creo otro botón para cancelar y volver a index.php
		-->
		<?php

		echo "<button> <a href='eliminar.php?dni=" . $dni . "&nombre=" . $nombre . "'>Eliminar Definitivamente</a></button>";
		echo "<button> <a href='index.php'>Cancelar</a></button>";

		?>

		</div>

<?php
include("menuUsuario.php");
include("pie.php");
?>