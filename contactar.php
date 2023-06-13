<?php

if(!isset($_SESSION["autenticado"])){

	session_start();
};

include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section class="secciones">
<br>
<br>
<img class="logo-seccion" src="img/header_21.png">
<br>
<br>
<h1>Dirección I.E.S. Severo Ochoa</h1>
<br>
<div class="mapa_google">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5500.5652711787125!2d-0.7194992001755077!3d38.27971206607436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd63b7ad6e40fdc1%3A0x609104ad972f51c4!2sIES%20Severo%20Ochoa%20Elx!5e0!3m2!1ses!2ses!4v1677962730912!5m2!1ses!2ses" width="450" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<br>
	<div class="texto">
	<h2>José Ignacio García Prieto.<br>
	Proyecto Fin de Grado Superior.<br>
	Desarrollo de Aplicaciones Web.</h2>
	</div>
<br>
<br>

</section>		    

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>