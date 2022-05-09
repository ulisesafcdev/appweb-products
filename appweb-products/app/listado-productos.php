<?php

require 'config.php';

$mysql = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($mysql->connect_errno){
    echo "Fallo al conectarse a la BBDD... " . $mysql->connect_error;
}

$query = "SELECT * FROM productos";

$result = $mysql->query($query);

?>

<!DOCTYPE>
<html lang="es">
<head>
	<title>Listado de Productos</title>
	
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

<h1>Listado de Productos</h1>
<hr>

<form action="insertar.php" method="post">
	<fieldset>
		
		<legend>Alta de nuevo producto</legend>
		
		<table>
			<tr>
				<td><label for="codigo">Codigo:</label></td>
				<td><input type="text" id="codigo" name="codigo"></td>
			</tr>
			
			</tr>
				<td><label for="nombre">Nombre Producto:</label></td>
				<td><input type="text" id="nombre" name="nombre"></td>
			</tr>
			
			</tr>
				<td><label for="categoria">Categoria:</label></td>
				<td><input type="text" id="categoria" name="categoria"></td>
			</tr>
			
			</tr>
				<td><label for="precio">Precio:</label></td>
				<td><input type="text" id="precio" name="precio"></td>
			</tr>
			
			</tr>
				<td><label for="cantidad">Cantidad:</label></td>
				<td><input type="number" id="cantidad" name="cantidad"></td>
			</tr>
			
			</tr>
				<td><label for="pais">Pais Origen:</label></td>
				<td><input type="text" id="pais" name="pais"></td>
			</tr>
			
			<tr>
				<td colspan=2><input type="submit" value="Dar de Alta"></td>
			</tr>			
		
		</table>
	</fieldset>
</form>

<hr>
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>CODIGO</th>
			<th>NOMBRE PRODUCTO</th>
			<th>CATEGORIA</th>
			<th>PRECIO</th>
			<th>CANTIDAD</th>
			<th>PAIS ORIGEN</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		
		<?php while ($fila = $result->fetch_assoc()) {?>
		
		<tr>
			<td><?= $fila['id'] ?></td>
			<td><?= $fila['codigo'] ?></td>
			<td><?= $fila['nombre_producto'] ?></td>
			<td><?= $fila['categoria'] ?></td>
			<td><?= $fila['precio'] ?></td>
			<td><?= $fila['cantidad'] ?></td>
			<td><?= $fila['pais_origen'] ?></td>
			<td>
				<a href="eliminar.php?id=<?= $fila['id']?>">Delete</a>
				<a href="row-data.php?id=<?= $fila['id']?>">Edit</a>
			</td>
		<tr>
		
		<?php }?>
	</tbody>
</table>

</body>

</html>