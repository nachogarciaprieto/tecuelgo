<?php

if(!isset($_SESSION["autenticado"])){

	session_start();
};

include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section>

<br>
<h1>CONTACTO</h1>
<br>
<br>
<h2>TRABAJO FIN DE CICLO<br>
	GRADO SUPERIOR EN<br>
	DESARROLLO DE APLICACIONES WEB</h2>
<br>
			
</section>		    

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>