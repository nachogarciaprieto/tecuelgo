<?php

function conectar(){

	try{

		$conexion= new PDO('mysql:host=localhost; dbname=db_tecuelgo.com', 'nacho', '9Hj7*2yJ1/');
		$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");
		return $conexion;

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());
	};
};

function selectPedidos(){

	try{

		$ID_email= $_COOKIE["ID_email"];
		global $resultado;

		$conexion= conectar();
		$sql= "SELECT * FROM pedidos WHERE ID_email = :ID_email"; // WHERE ID_categoriaPadre = null
		$resultado= $conexion->prepare($sql);
		$resultado->execute(array(":ID_email"=>$ID_email));
		// echo "conexión con exito";

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	}

	};


function selectTodosPedidos(){

	try{

		
		global $resultado;

		$conexion= conectar();
		$sql= "SELECT * FROM pedidos"; // WHERE ID_categoriaPadre = null
		$resultado= $conexion->prepare($sql);
		$resultado->execute(array());
		// echo "conexión con exito";

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	}

	};

	
function selectLineasPedido(){

	try{

		$ID_codigoPedido= $_GET["ID_codigoPedido"];
		global $res;

		$conexion= conectar();
		$sql= "SELECT * FROM lineaspedido WHERE ID_codigoPedido = :ID_codigoPedido AND cantidad > 0"; // WHERE ID_categoriaPadre = null
		$res= $conexion->prepare($sql);
		$res->execute(array(":ID_codigoPedido"=>$ID_codigoPedido));
		// echo "conexión con exito";

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	}
};


function altaLineaPedido($ID_codigoPedido, $value, $precioVenta, $ID_codigoArticulo){

	try{

		$conexion= conectar();

		$ID_codigoPedido= $ID_codigoPedido;
		//$totalArticulos= $totalArticulos;
		$descuento= 0;
		$precioVenta= $precioVenta;
		$ID_codigoArticulo= $ID_codigoArticulo;
		$value= $value;


		
	    $sql = "INSERT INTO lineaspedido "
		. "(ID_codigoPedido, cantidad, descuento, precioVenta, ID_codigoArticulo)"
		. "VALUES "
		. "('$ID_codigoPedido', '$value', '$descuento', '$precioVenta', '$ID_codigoArticulo')";

	
		$resultado= $conexion->prepare($sql);

		/*
		Despues de crear el objeto con el resultado hay que llamar a la función execute().
		Esta función pasa los parámetros que queramos en forma de array a la consulta.
		*/
		$resultado->execute(array());




	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	};
};

function selectArticulosCategoria($ID_codigoCategoria){

	try{

		$categoria= $ID_codigoCategoria;
		global $resultado;
		$conexion= conectar();
		$sql= "SELECT * FROM articulos WHERE ID_codigoCategoria = :ID_codigoCategoria";
		$resultado= $conexion->prepare($sql);
		$resultado->execute(array(":ID_codigoCategoria"=>$categoria));
		// echo "conexión con exito";

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());
	};
};

// no funciona?
function nombreCategoria($ID_codigoCategoria){

	try{
			//$ID_codigoCategoria= $ID_codigoCategoria;
			global $resultado;

			$conexion= conectar();
			$sql= "SELECT descripcionCategoria FROM categorias WHERE ID_codigoCategoria = :ID_codigoCategoria";
			$resultado= $conexion->prepare($sql);
			$resultado->execute(array(":ID_codigoCategoria"=>$ID_codigoCategoria));
			// echo "conexión con exito";

		}catch(Exception $e){

			die('Error: ' . $e->GetMessage());
	};
};


function selectArticulos($key){

	try{

			global $resultado;
			$conexion= conectar();
			$sql= "SELECT * FROM articulos WHERE ID_codigoArticulo = :ID_codigoArticulo";
			$resultado= $conexion->prepare($sql);
			$resultado->execute(array(":ID_codigoArticulo"=>$key));
			// echo "conexión con exito";

		}catch(Exception $e){

			die('Error: ' . $e->GetMessage());
	};
};


/*
function comprar(){


	if (isset($_GET["ID_articulo"])){

		$ID_articulo= $_GET["ID_articulo"];

		if (!isset($_COOKIE["carrito"][$ID_articulo])){

			setcookie("carrito[$ID_articulo]",1, time()+60*60*24*365, "/");
		}else{
		
			//Si está definida la variable $_COOKIE entonces le incremento el valor en 1.		
			setcookie("carrito[$ID_articulo]",$_COOKIE["carrito"][$ID_articulo] + 1, time()+60*60*24*365, "/");

		};

	};
};
*/

function selectClientes(){

	try{

		global $resultado;

		$conexion= conectar();
		$sql= "SELECT * FROM usuarios WHERE tipoUsuario=3";
		$resultado= $conexion->prepare($sql);
		$resultado->execute();
		// echo "conexión con exito";

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	}

	}


function selectPerfil(){

	try{
		// Tengo que declarar como global para que esté accesible fuera de la función.
		// Es esto correcto?
		global $resultado;

		$conexion= conectar();
		$ID_email= $_COOKIE["ID_email"];


		$sql= "SELECT * FROM usuarios WHERE ID_email = :ID_email";
		$resultado= $conexion->prepare($sql);
		$resultado->execute(array(":ID_email"=>$ID_email));
		// echo "conexión con exito";

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

};

};


function selectVendedores(){

	try{

		global $resultado;

		$conexion= conectar();
		$sql= "SELECT * FROM usuarios WHERE tipoUsuario=2";
		$resultado= $conexion->prepare($sql);
		$resultado->execute();
		// echo "conexión con exito";

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	}

	}


function selectCategorias(){

	try{

		global $resultado;

		$conexion= conectar();
		$sql= "SELECT * FROM categorias"; // WHERE ID_categoriaPadre = null
		$resultado= $conexion->prepare($sql);
		$resultado->execute();
		// echo "conexión con exito";

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	}

	};


function selectNumeroArticulos(){

	try{

		if (isset($_GET["ID_codigoCategoria"])){

			$ID_codigoCategoria= $_GET["ID_codigoCategoria"];

			global $resultado;

			$conexion= conectar();
			$sql= "SELECT COUNT(*) FROM articulos WHERE ID_codigoCategoria = :ID_codigoCategoria AND activo = 1";
			$resultado= $conexion->prepare($sql);
			$resultado->execute(array(":ID_codigoCategoria"=>$ID_codigoCategoria));

		};


	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	}

};	


function selectNumeroCategorias(){

	try{

		global $resultado;

		$conexion= conectar();
		$sql= "SELECT COUNT(*) FROM categorias"; // WHERE ID_categoriaPadre = null
		$resultado= $conexion->prepare($sql);
		$resultado->execute();
		// echo "conexión con exito";
		// return $sql;

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	}

	};	


function selectPasswords(){

	try{

		global $resultado;
		$ID_email= $_GET["ID_email"];

		$conexion= conectar();
	
		$sql= "SELECT * FROM usuarios WHERE ID_email = '" . $_GET["ID_email"] . "'";
		$resultado= $conexion->prepare($sql);
		$resultado->execute(array(":ID_email"=>$ID_email));
		//return $sql;
	


		//echo "conexión con exito";

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	}
};


function selectAdministradores(){

	try{

		global $resultado;

		$conexion= conectar();
		// En sql el tipoUsuario se contea a partir de 1 no de 0
		$sql= "SELECT * FROM usuarios WHERE tipoUsuario=1";
		$resultado= $conexion->prepare($sql);
		$resultado->execute();
		// echo "conexión con exito";

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	}

};


function altaCliente(){

try{

	if(isset($_GET["ID_email"]) && isset($_GET["password"])){

		$tipoUsuario= 1;
		$ID_email= $_GET["ID_email"];
		$password= $_GET["password"];

		$conexion= conectar();
	    $sql = "INSERT INTO usuarios "
		. "(ID_email, password, tipoUsuario)"
		. "VALUES "
		. "('$ID_email', '$password', '$tipoUsuario')";

	
		$resultado= $conexion->prepare($sql);

		/*
		Despues de crear el objeto con el resultado hay que llamar a la función execute().
		Esta función pasa los parámetros que queramos en forma de array a la consulta.
		*/
		$resultado->execute(array($ID_email, $password, $tipoUsuario));

	};

	// Pongo un condicional para que sólo imprima el mensaje si se ha definido el cliente, de otra forma daría error al entrar en la página pues todavía no se ha creado las variables.
	if(isset($ID_email)){
		
		echo "<h2><span style='font-size: 30pt;'>El cliente <b>" . $ID_email . "</b> ha sido introducido con <b>ÉXITO<b>.</h2>";

	};

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	};
};


function selectCliente(){

	try{
		// Tengo que declarar como global para que esté accesible fuera de la función.
		// Es esto correcto?
		global $resultado;
		$conexion= conectar();
		$sql= "SELECT * FROM usuarios WHERE ID_email= :ID_email";
		$resultado= $conexion->prepare($sql);
		$resultado->execute();
		// echo "conexión con exito";

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	};
};


function selectTipoUsuario(){

	try{
		// Tengo que declarar como global para que esté accesible fuera de la función.
		// Es esto correcto?
		global $resultado;
		$conexion= conectar();
		$sql= "SELECT tipoUsuario FROM usuarios WHERE ID_email= :ID_email";
		$resultado= $conexion->prepare($sql);
		$resultado->execute();
		// echo "conexión con exito";

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	};
};

?>



