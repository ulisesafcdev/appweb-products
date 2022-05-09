<?php

require 'config.php';

$id = $_GET['id'];

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($mysqli->connect_errno){
    echo "Fallo al conectar con la BBDD... " . $mysqli->connect_error;
}

$query = "SELECT * FROM productos WHERE id = ?";

$state = $mysqli->prepare($query);
$state->bind_param('i', $id);

if(!$state->execute()){
    echo "Fallo al cargar registro... " . $state->error;
}

$resultado = $state->get_result();
$fila = $resultado->fetch_assoc();

?>

<!DOCTYPE>
<html lang="es">
<head>
	<title>Actualizar Producto</title>
	
	<style type="text/css">
	   * {
	       font-family: sans-serif;
	   }
	   table, th, td {
	       border: 1px solid black;
	       border-collapse: collapse;
	       text-align: center;
	       padding: .5rem 1.5rem;
	   }
	   thead{
	       background-color: lightgreen;
	   }
	   
	   tbody{
	       background-color: lightblue;
	   }
	</style>
</head>

<body>

	<h1>Actualizar Producto</h1>
	<hr>
	<a href="listado-productos.php">Regresar a Listado de Productos</a>
	<hr>
	<form action="editar.php" method="post">
		
		<fieldset>
			<legend>Editar Datos</legend>
			<table>
				<input type="hidden" name="id" value="<?= $fila['id']?>">
    			<tr>
    				<td><label for="codigo">Codigo:</label></td>
    				<td><input type="text" id="codigo" name="codigo" value="<?= $fila['codigo'] ?>"></td>
    			</tr>
    			
    			</tr>
    				<td><label for="nombre">Nombre Producto:</label></td>
    				<td><input type="text" id="nombre" name="nombre" value="<?= $fila['nombre_producto'] ?>"></td>
    			</tr>
    			
    			</tr>
    				<td><label for="categoria">Categoria:</label></td>
    				<td><input type="text" id="categoria" name="categoria" value="<?= $fila['categoria'] ?>"></td>
    			</tr>
    			
    			</tr>
    				<td><label for="precio">Precio:</label></td>
    				<td><input type="text" id="precio" name="precio" value="<?= $fila['precio'] ?>"></td>
    			</tr>
    			
    			</tr>
    				<td><label for="cantidad">Cantidad:</label></td>
    				<td><input type="number" id="cantidad" name="cantidad" value="<?= $fila['cantidad'] ?>"></td>
    			</tr>
    			
    			</tr>
    				<td><label for="pais">Pais Origen:</label></td>
    				<td><input type="text" id="pais" name="pais" value="<?= $fila['pais_origen'] ?>"></td>
    			</tr>
    			
    			<tr>
    				<td colspan=2><input type="submit" value="Actualizar Datos"></td>
    			</tr>			
		
			</table>
		</fieldset>
		
	</form>

</body>

</html>









