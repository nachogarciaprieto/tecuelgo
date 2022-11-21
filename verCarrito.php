<?php

if(!isset($_SESSION["autenticado"])){

    session_start();
};

//include("seguridad/seguridadCliente.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");

/*
Para que no de error de no definido cuando el usuario no compra 
ningún producto de alguna de las categorías, hago 3 condicionales 
para comprobar si está definida la variable y en caso de que no esté
definida le doy el valor de 0 para que aparezca en el carrito como 0.
*/
if (isset($_GET["ID_articulo"])){

    $ID_articulo= $_GET["ID_articulo"];

    if (!isset($_COOKIE["carrito"][$ID_articulo])){

        $_COOKIE["carrito"][$ID_articulo]= 0;
    };
};


if (isset($_GET["value"]) && isset($_GET["referencia"])){

$value= $_GET["value"];
$referencia= $_GET["referencia"];

setcookie("carrito[$referencia]", $value, time()+60*60*24*365, "/");

};

//$ID_email=$_GET["ID_email"];



// Si no están definidos el nº de artículos y el precio total los defino
// y los inicializo a 0.
if (!isset($totalArticulos)){

    $totalArticulos= 0;

}else{

    //setcookie("totalArticulos", $totalArticulos, time()+10000000, "/");
};

if (!isset($totalPrecio)){

	$totalPrecio= 0;

}else{

    //setcookie("totalPrecio", $totalPrecio, time()+10000000, "/");
};


?> 

<section>
   
<br>
<br>
<h1>TU CARRITO.</h1>
<br>
<br>

<?php

echo "<br>";



conectar();


if (isset($_COOKIE["carrito"])){


echo "
<table>

    <th>AUTOR</th><th>TÍTULO</th><th>DESCRIPCIÓN</th><th>PRECIO</th><th>UNIDADES</th><th>MODIFICAR CANTIDAD</th><th>TOTAL</th>";

// if(isset($_GET["value"]) && isset($_GET["referencia"])){

// $value= $_GET["value"];
// $fila[0]= $_GET["referencia"]

// };





    
$key= ksort($_COOKIE["carrito"]);

foreach ($_COOKIE["carrito"] as $key => $value){

    selectArticulos($key);


	while($fila=$resultado->fetch()){

        if(isset($_GET["value"]) && isset($_GET["referencia"]) && $_GET["referencia"] == $fila[0]){

        $value= $_GET["value"];
        //$fila[0]= $_GET["referencia"];

        // MODIFICA LA COOKIE PARA QUE GUARDE EL NUEVO VALOR

        };

        if ($value>= 1) {

	        echo "<tr>";
	        
	        echo "<td>" . $fila[1] . "</td>";
	        echo "<td>" . $fila[2] . "</td>";
	        echo "<td style='font-size: 0.8em'>" . $fila[3] . "</td>";
	        
	        echo "<td>" . $fila[4] . "</td>";
	        echo "<td>" . $value . "</td>";  


	        // El total
	        
	        echo "<td><button> <a href='actualizarCarrito.php?value=" . ($value+1) . "&referencia=" . $fila[0] . "'>+1</a></button>
	        		  <button> <a href='actualizarCarrito.php?value=" . ($value-1) . "&referencia=" . $fila[0] . "'>-1</a></button></td>";
	        echo "<td><b>" . ($fila[4]*$value) . " €</b></td>"; 
	        	


	        echo "</tr>";
	        
	 

			 $totalArticulos+= $value;

			 $totalPrecio+= ($fila[4]*$value);

       $_COOKIE["totalArticulos"]= $totalArticulos; 
       $_COOKIE["totalPrecio"]= $totalPrecio;

           //setcookie("totalArticulos", $totalArticulos, time()+10000000, "/");
           //setcookie("totalPrecio", $totalPrecio, time()+10000000, "/");

        };

            
};

};







    echo "

    
    <tr>
        <td colspan='5'></td><td>Total Unidades<b><br>" . $totalArticulos . "</b></td><td>Precio Total<b><br>" . $totalPrecio . " €</b></td>
    </tr>
    </table>";

};

    	?>

        <!--
        Creo un hipervínculo a la tienda para poder seguir comprando
        y otro a la página realizarcompra.
        -->
        <div id='paginacion'>

              <br>
              <br>
              <br>
              <br>
              <?php
              
              echo "<button class='paginacion'><a href='index.php'>Seguir Comprando</a></button>";
              //echo '<a class="boton1" href="altaPedido.php?totalArticulos=' . $totalArticulos . '&totalPrecio=' . $totalPrecio . '>Realizar Compra</a>';
              
           
              echo "<button class='paginacion'><a href='altaPedido.php?totalArticulos=" . $totalArticulos . "'>Realizar
               Compra</a></button>";
            ?>
 
        </div>    

    </section>

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>

