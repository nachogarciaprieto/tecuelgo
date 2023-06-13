<?php
		
if(isset($_GET["ID_email"])){

	$ID_email= $_GET["ID_email"];

	echo '<nav id="menuprincipal">';

		echo '<ul class="menuprincipal">';	

			echo '<li><button><a href="index.php?ID_email=' . $ID_email . '" >Inicio</a></button></li>';
			echo '<li><button><a href="categorias.php?ID_email=' . $ID_email . '" >Categorías</a></button></li>';
			echo '<li><button><a href="nosotros.php?ID_email=' . $ID_email . '" >Nosotros</a></button></li>';
			echo '<li><button><a href="contactar.php?ID_email=' . $ID_email . '" >Contactar</a></button></li>';
			echo '<li><button><a href="legal.php?ID_email=' . $ID_email . '" >Legal</a></button></li>';			
			
		echo '</ul>';

	echo '</nav>';

}else{

	echo '<nav id="menuprincipal">';

		echo '<ul class="menuprincipal">';	

			echo '<li><button><a href="index.php" >Inicio</a></button></li>';
			echo '<li><button><a href="categorias.php" >Categorías</a></button></li>';
			echo '<li><button><a href="nosotros.php" >Nosotros</a></button></li>';
			echo '<li><button><a href="contactar.php" >Contactar</a></button></li>';
			echo '<li><button><a href="legal.php" >Legal</a></button></li>';			
			
		echo '</ul>';

	echo '</nav>';

};

?>
