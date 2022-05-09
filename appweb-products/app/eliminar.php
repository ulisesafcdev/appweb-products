<?php

require 'config.php';

$id = $_GET['id'];

$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a la BBDD... " . $mysqli->connect_error;
}

$query = "DELETE FROM productos WHERE id = ?";

$state = $mysqli->prepare($query);
$state->bind_param('i', $id);

if(!$state->execute()){
    echo "Fallo al eliminar el producto... " . $state->error;
} else {
    echo "<h3>Se elimino el producto...</h3><br>";
    echo "<a href='listado-productos.php'>Ver listado de productos</a>";
}

$state->close();
$mysqli->close();

?>