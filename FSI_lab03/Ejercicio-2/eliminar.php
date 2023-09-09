<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Eliminar el usuario
    $query = "DELETE FROM usuarios WHERE id = $id";
    
    if ($conexion->query($query) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error al eliminar el usuario: " . $conexion->error;
    }
}

$conexion->close();
?>
