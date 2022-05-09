<?php

require 'config.php';

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$pais = $_POST['pais'];

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a BBDD... " . $mysqli->connect_error;
}

$query = "INSERT INTO productos(codigo, nombre_producto, categoria, precio, cantidad, pais_origen) VALUES(?, ?, ?, ?, ?, ?)";

$state = $mysqli->prepare($query);
$state->bind_param('sssdis', $codigo, $nombre, $categoria, $precio, $cantidad, $pais);

if(!$state->execute()){
    echo "Hubo un error al dar de alta el registro..." . $state->error;
} else {
    echo "<h3>Se dio de Alta el nuevo producto...</h3><br>";
    echo "<a href='listado-productos.php'>Ver Listado de Productos</a>";
}

$state->close();
$mysqli->close();

?>