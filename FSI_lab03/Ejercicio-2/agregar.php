<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar la adición de usuario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    
    $query = "INSERT INTO usuarios (nombre, correo) VALUES ('$nombre', '$correo')";
    
    if ($conexion->query($query) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error al agregar el usuario: " . $conexion->error;
    }
}

$conexion->close();
?>
