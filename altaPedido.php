<?php

if(!isset($_SESSION["autenticado"])){

	session_start();
};



//include("seguridad/seguridadCliente.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");



?>

<section class="secciones-editables">

<?php

if(!isset($_SESSION["autenticado"])){

echo "<br><br><h2><b>DEBES ESTAR LOGUEADO PARA REALIZAR LA COMPRA."
	 . "<br><br>SI NO TIENES CUENTA REGISTRATE EN UN SÓLO CLIC.</b></h2>";
	 

}elseif ($_SESSION["autenticado"] !== "cliente") {
	
	echo "<br><br><h2><b>SÓLO LOS USUARIOS CLIENTES PUEDEN REALIZAR PEDIDOS.</b></h2>";

}else{

// conectar();

// altaPedido();

// $ID_codigoPedido= recuperaID_Pedido();

// //altaLineaPedido($ID_codigoPedido);

// echo $ID_codigoPedido;


//$ID_codigoPedido= recuperaID_codigoPedido();

//altaLineaPedido($ID_codigoPedido);

////////////////////////////////////


	echo "<br><br><br>";

	// if (!isset($totalArticulos)){

	// 	$totalArticulos= 0;
	// };

	// if (!isset($totalPrecio)){

	// 	$totalPrecio= 0;
	// };

if (isset($_GET["totalArticulos"])){

	$totalArticulos= $_GET["totalArticulos"];
};

	// La conexión y recorrer los articulos y pintarlos en la tabla

	conectar();
	
	//$ID_codigoPedido= recuperaID_codigoPedido();
	//$ID_codigoPedido= altaPedido();

	//$altaLineaPedido($ID_codigoPedido);

			
	//altaPedido();
	// Aquí pongo el contenido de la función para que pueda sacar el valor de la última id
	// Si está dentro una de otra no puedo dar de alta el pedido y retornar el valor a la vez

	$conexion= conectar();

	$fechaPedido=  date("y.m.d");    //date("m.d.y");
	$estado= "enpreparacion";
	$ID_email= $_COOKIE["ID_email"];
	

	
    $sql = "INSERT INTO pedidos "
	. "(fechaPedido, estado, ID_email)"
	. "VALUES "
	. "('$fechaPedido', '$estado', '$ID_email')";


	$resultado= $conexion->prepare($sql);

	/*
	Despues de crear el objeto con el resultado hay que llamar a la función execute().
	Esta función pasa los parámetros que queramos en forma de array a la consulta.
	*/
	$resultado->execute(array($fechaPedido, $estado, $ID_email));

	// Añado la línea de la función que me da el último id
	$ID_codigoPedido= $conexion->lastInsertId();
	// y ahora ya le puedo pasar a la función altaLineasPedido() el valor del último ID.


////////// hasta aquí altaPedido



	// Ordeno el array con ksort().
	$key= ksort($_COOKIE["carrito"]);

	// Recorro el array de la cookie carrito.
	foreach ($_COOKIE["carrito"] as $key => $value){

		// Ejecuto la consulta selecArticulos() pasándole el índice de cada elemento del array cada vez.
    	selectArticulos($key);





    	// Recorro todas las filas resultantes de la consulta
		while($fila=$resultado->fetch()){

			// Me situo en cada elemento
        	if(isset($_GET["value"]) && isset($_GET["referencia"]) && $_GET["referencia"] == $fila[0]){

        		// Le asigno el valor que recibe por url enviado desde si mismo
        		// pues lo envío modificado si suma un artículo o si resta un artículo.
        		$value= $_GET["value"];
        	};

        	$precioVenta= $fila[4];

        	        	

        	//$ID_codigoPedido= verID_codigoPedido();

        	$ID_codigoArticulo= $fila[0];

        	altaLineaPedido($ID_codigoPedido, $value, $precioVenta, $ID_codigoArticulo);



        	 //echo $ID_codigoPedido;






		};
	};

echo "<h2 style='font-size: 30pt;'>El pedido ha sido realizado con <b>ÉXITO</b>.</h2>"
	 . "<br><h2 style='font-size: 24pt;'>Tu pedido está <b>EN PREPARACIÓN.</b></h2>"
	 . "<br><h2 style='font-size: 18pt;'>Puedes comprobar y modificar tus pedidos en el vínculo siguiente.</h2>"
	 . "<br><h2 style='font-size: 12pt;'><p><b><button><a href='misPedidos.php'>MIS PEDIDOS</a></button></b></h2></p>";

};




//$ID_codigoPedido= recuperaID_codigoPedido();

//altaLineaPedido($ID_codigoPedido);





?>

</section>

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>
