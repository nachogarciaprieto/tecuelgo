<?php

if(!isset($_SESSION["autenticado"])){

	session_start();

};

// include o include_once con funciones.php ?
//include("seguridad/seguridad.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section>

<br>
<br>


<img class="logo-seccion" src="img/header_21.png">
<br>
<br>
<h1>LEGAL</h1>
<br>
<br>
<h2>TRABAJO FIN DE CICLO<br>
	GRADO SUPERIOR EN<br>
	DESARROLLO DE APLICACIONES WEB</h2>
<br>
<p>
<div class="texto">
<h1>AVISO LEGAL</h1>
<br>
<br>
<b>IDENTIFICACIÓN DEL TITULAR DEL SITIO WEB</b>
<br>
El titular del sitio web www.tecuelgo.com es José Ignacio García Prieto, alumno del I.E.S. Severo Ochoa de Elche, que cursa el módulo de Proyecto Fin de Grado Superior en Desarrollo de Aplicaciones Web y que Desarrolla esta tienda online como Proyecto Final De Grado.
<br>
<br>
<b>OBJETO</b>
<br>
El presente aviso legal regula el uso y acceso al sitio web www.tecuelgo.com, así como los servicios y contenidos ofrecidos por José Ignacio García Prieto en dicho sitio web.
<br>
<br>
<b>USO DEL SITIO WEB</b>
<br>
Este sitio web es para uso exclusivo del Tribunal Evaluador en calidad de evaluadores, mi tutor José Adrés Torres en calidad de tutor y Evaluador y yo mismo en calidad de desrrollador del proyecto. Quedan invitados también a probar las funcionalidades de este proyecto algunos compañeros de Grado. A todos vosotr@s GRACIAS!.
<br>
<br>
<b>PROPIEDAD INTELECTUAL</b>
<br>
Los derechos de propiedad intelectual sobre los contenidos, diseño gráfico y código fuente del sitio web www.tecuelgo.com son titularidad de José Ignacio García Prieto y/o de terceros, sin que puedan entenderse cedidos al usuario, en virtud de lo dispuesto en el presente aviso legal, ningún derecho de explotación sobre los mismos más allá de lo estrictamente necesario para el correcto uso del sitio web como proyecto fin de grado.
<br>
<br>
<b>LIMITACIÓN DE RESPONSABILIDAD</b>
<br>
José Ignacio García Prieto no será responsable de los daños y perjuicios de cualquier naturaleza que puedan derivarse del uso del sitio web, incluyendo, sin carácter limitativo, los daños y perjuicios derivados de la interrupción del servicio, la pérdida de información, la infracción de derechos de propiedad intelectual, la introducción de virus informáticos, etc.
<br>
<br>
<b>LEY Y JURISDICCIÓN APLICABLES</b>
<br>
El presente aviso legal se regirá e interpretará de acuerdo con la legislación española. Para cualquier controversia que pudiera derivarse del acceso o uso del sitio web, las partes se someten a los Juzgados y Tribunales, con renuncia expresa a cualquier otro fuero que pudiera corresponderles.
<br>
<br>
</p>
</div>
<br>
<img class="logo-texto-safe" src="img/logo_safe_creative.png">	
			
</section>		 

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>