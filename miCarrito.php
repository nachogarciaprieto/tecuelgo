<?php
//include("seguridad/seguridadCliente.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");
?>

<section class="secciones-editables">

	<br>		
	<h1 style="font-size: 30pt;">MI CARRITO</h1>

        <br>
        <br>
        
        <!--
        Para mostrar las frases "Tienes tantos productos en el carrito o "El carrito está vacío"
        hago un if en el que evalúo si hay productos almacenados en las cookies (mediante la variable $totalArticulos)
        imprima por pantalla el nº de artículos y si no tiene artículos que diga que no hay artículos.
    	-->
		<?php



		if(isset($_GET["ID_articulo"])){

			$ID_articulo= $_GET["ID_articulo"];
		}

       
        if (!isset($_COOKIE["carrito"][$ID_articulo])){

            $_COOKIE["carrito"][$ID_articulo]=0;
        };


        // El Carrito está Vacío.
		if ($_COOKIE["carrito"][$ID_articulo] == 0){

            echo "<h2>EL CARRITO ESTÁ VACÍO.</h2>";
            
		}else{

            $totalArticulos+= $_COOKIE["carrito"][$ID_articulo];

            // Imprimo el nº de productos añadidos que es la suma de todas las referencias.
            echo "<h2>TIENES <b>" . $totalArticulos . "</b> ARTÍCULOS EN EL CARRITO.</h2>";
			
		};

        echo "<br>";



    // Lo primero que voy a hacer es crear un array de arrays para guardar todos los productos.

    /*
    Creo los arrays asociativos para cada producto con los valores de la referencia,
    la descripcion, y el precio.
    */
    $ref1 = array("ref" => "ref1","descripcion" => "Bote de Alubias", "precio" => 1.05);
    $ref2 = array("ref" => "ref2","descripcion" => "Paquete de Arroz", "precio" => 1.15);
    $ref3 = array("ref" => "ref3","descripcion" => "Lata de Aceitunas", "precio" => 2.35);

    // Creo el array indexado de los array de los productos
    $productos = array($ref1, $ref2, $ref3 );

	echo "

	<table border>

	<tr>
		<th>Referencia</th> <th>Descripción</th> <th>Precio Unitario</th> <th>Añadir Artículos</th>
	</tr>";
	
	/*
	El bucle viene a decir para i= a 0, 1 y 2, es decir para cada producto del array productos,
	me imprima en cada caso la posición "ref", la posición "descripcion" y la posición "precio", 
	además del vínculo a la página compra.php para ir incrementando el nº de productos.
	En el vínculo le paso por url "ref" que es el valor de la referencia.
	Voy a crear ahora el script compra.php
	*/
	for ($i=0; $i<3 ; $i++) { 

		echo "<tr>
			  <td>". $productos[$i]["ref"] . "</td>";
		echo "<td>" . $productos[$i]["descripcion"]  . "</td>";
		echo "<td>" . $productos[$i]["precio"] . "</td>";
		echo "<td> <a href='compra.php?ref=" . $productos[$i]["ref"] . " '> Comprar </td>
			  </tr>
			  <br>";

	};
	
	echo "</table>";
			


    	?>

        <!--
        Creo un vínculo al archivo salir que lo que hace es cerrar la sesión
        y llevarte al index.php para nuevo logueo.
        Creo también un vínculo a vercarrito.php en el que veremos el carrito.
        -->
        <div class="vinculo">
              <br>
              <br>
              <a class="boton1" href="salir.php">Cerrar Sesion</a>
              <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
              <a class="boton1" href="vercarrito.php">Ver Mi Carrito</a>
        </div> 
			
</section>

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>
