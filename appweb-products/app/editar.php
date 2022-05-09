<?php

require 'config.php';

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$pais = $_POST['pais'];
$id = $_POST['id'];

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($mysqli->connect_errno){
    echo "Fallo al conectarse con la BBDD... " . $mysqli->connect_error;
}

$query = "UPDATE productos SET codigo = ?, nombre_producto = ?, categoria = ?, precio = ?, cantidad = ?, pais_origen = ? WHERE id = ?";

$state = $mysqli->prepare($query);
$state->bind_param('sssdisi', $codigo, $nombre, $categoria, $precio, $cantidad, $pais, $id);

if(!$state->execute()){
    echo "Fallo al actualizar registro... " . $state->error;  
} else {
    echo "<h3>Producto actualizado correctamente...</h3><br>";
    echo "<a href='listado-productos.php'>Ver Listado de Porductos</a>";
}

$state->close();
$mysqli->close();

?>