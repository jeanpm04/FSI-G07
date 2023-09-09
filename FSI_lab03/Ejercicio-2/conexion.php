<?php
$conexion = new mysqli('localhost', 'root', '', 'crud_usuarios');

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>
