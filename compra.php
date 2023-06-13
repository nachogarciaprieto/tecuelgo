<?php

include("actualizarCarrito.php");

// Lo primero voy a recoger en una variable el valor que he pasado por url

if (isset($_GET["ID_articulo"])){

	$ID_articulo= $_GET["ID_articulo"];
};

if (isset($_GET["precioArticulo"])){

	$precioArticulo= $_GET["precioArticulo"];
};
/*
Ahora voy a crear la cookie, la cual irá almacenando la cantidad de artículos,
el funcionamiento es el siguiente:
Si no existe la cookie, la creo con valor 1 y si existe, el valor de la cookie es el que tenía +1.
Inmediatamente después reenvío al index para que parezca que no se ha movido de la web
pero ahora se ha incrementado en 1 el nº de artículos. Esto es lo que se llama un script transparente.
*/

/* Con este if hago que si no está definida la variable Super Global $_COOKIE["carrito"]
en su posición $ref entra al código y la crea.
*/
if (!isset($_COOKIE["carrito"][$ID_articulo])){

		/*
		Creo la cookie con los campos, nombre, le pongo el valor 1 pues es la primera vez
		que hacen clic, le pongo un año de vida y le digo que existe para todo el sitio web.
		*/
		setcookie("carrito[$ID_articulo]",1, time()+60*60*24*365, "/");

}else{
	
		//Si está definida la variable $_COOKIE entonces le incremento el valor en 1.		
		setcookie("carrito[$ID_articulo]",$_COOKIE["carrito"][$ID_articulo] + 1, time()+60*60*24*365, "/");

};
  
// Para finalizar hago un redireccionamiento con head a la tienda

include("actualizarCarrito.php");

header('Location:' . getenv('HTTP_REFERER') . "?precioArticulo=" . $precioArticulo);

?>