<?php
include("seguridad/seguridadAdministrador.php");
include("includes/funciones.php");
include("includes/cabecera.php");
include("includes/menuPrincipal.php");
include("includes/menuCategorias.php");

?>

<section>

	<br>
	<br>
	<br>
	<h1><span style="font-size: 30pt;">EDITAR CATEGORÍAS</h1>
	<br>

	<?php
    
    try{

	    $ID_codigoCategoria= $_GET["ID_codigoCategoria"];
		$conexion= conectar();
	    $sql= "SELECT * FROM categorias WHERE ID_codigoCategoria = :ID_codigoCategoria";
		$resultado= $conexion->prepare($sql);
		$resultado->execute(array(":ID_codigoCategoria" => $ID_codigoCategoria));

		while($fila= $resultado->fetch()){

			$ID_codigoCategoria= $fila[0];
			$descripcionCategoria= $fila[1];
			$activo= $fila[2];
			//$ID_categoriaPadre= $fila[3];
		}

	}catch(Exception $e){

		die('Error: ' . $e->GetMessage());

	};

    ?>

	<div id="caja_centrada">

	<form  action="modificarCategoria.php" method="get" enctype="text/plain">

    <fieldset>	    	
    <legend><b>DATOS DEL CLIENTE</b></legend>
    <br>
    ID_codigoCategoria: <input type="text" name="ID_codigoCategoria" value="<?php echo $ID_codigoCategoria; ?>" readonly/>
    <br>
    <br>  
    Descripción Categoría: <input type="text" name="descripcionCategoria" value="<?php echo $descripcionCategoria; ?>" />
    <br>
    <br>
    Activo Categoría: <input type="text" name="activo" value="<?php echo $activo; ?>" />
    <br>
<!--     <br>
    Categoría Padre: <input type="text" name="ID_categoriaPadre" value="<?php echo $ID_categoriaPadre; ?>" />
    <br> -->
    
    <br>

    </fieldset>

    <br>

    <fieldset>
    <legend><b>ACCIONES</b></legend>

    <br>

    <!-- 
    Botón "Modificar" que envía los datos a modificar.php y
    botón "Cancelar" que te reenvía a index.php
	-->
    <p><input type="submit" value="Modificar" /></p>
    <br>
    <a href="editarCategorias.php"><input type="button" value="Cancelar"></a>
    <br>
    <br> 	    

	</fieldset>

    <br>

    </form>

    <br>
	    
</section>

<?php
include("includes/menuAdministrador.php");
include("includes/pie.php");
?>
