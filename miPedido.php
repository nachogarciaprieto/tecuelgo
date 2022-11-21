<?php

include("seguridad/seguridadCliente.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");

?>

<section>


	<?php

if (!isset($totalArticulos)){

    $totalArticulos= 0;

};

if (!isset($totalPrecio)){

	$totalPrecio= 0;

};




	if(!isset($_SESSION["autenticado"])){

	//session_start();

	echo "<h1>DEBES ESTAR LOGUEADO PARA VER TUS PEDIDOS.<br> SI NO TIENES CUENTA REGISTRATE EN UN SÓLO CLIC</h1>";

	}else{

		
		if (isset($_GET["ID_codigoPedido"])){

			$ID_pedido= $_GET["ID_codigoPedido"];

		

	echo "<br><br>		
	<h1 style='font-size: 26pt;'>ESTE ES TU PEDIDO CON CÓDIGO " . $ID_pedido . "</h1>
	<br>
	<br>
	<table>

		<th>AUTOR</th><th>TITULO</th><th>DESCRIPCIÓN</th><th>CANTIDAD</th><th>DESCUENTO</th><th>PRECIO ARTÍCULO</th><th>TOTAL</th>";
		
		


		selectLineasPedido();

		while($fila=$res->fetch()){


			selectArticulos($fila[5]);

			while ($registro=$resultado->fetch()){


			echo "<tr>";
			echo "<td>" . $registro[1] . "</td>";
			echo "<td>" . $registro[2] . "</td>";
			echo "<td>" . $registro[3] . "</td>";


			};

		

			echo "<td>" . $fila[2] . "</td>";
			echo "<td>" . $fila[3] . "</td>";
			echo "<td>" . $fila[4] . "</td>";			
			echo "<td>" . ($fila[2]*$fila[4]) . "</td>";
			echo "</tr>";

			$totalArticulos+= $fila[2];

			$totalPrecio+= ($fila[4]*$fila[2]);





		
		};






			



	echo "</table>";

	echo "<br></table>";


    echo "
    <br>
    <table id='totalPrecio'>
    <tr>
        <td>Número Total de Productos: <b>" . $totalArticulos . "</b></td><td>Precio Total del Pedido: <b>" . $totalPrecio . " €</b></td>
    </tr>
    </table>";

	echo '<br><br><p><button><a href="misPedidos.php">VOLVER A MIS PEDIDOS</a></button></p>';

		}else {

			echo "<h1>No existe ese pedido</h1>";

		};



};
	
?>

</section>

<?php
include("includes/menuUsuario.php");
include("includes/pie.php");
?>
