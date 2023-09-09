<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $autor = $_POST["autor"];
    $isbn = $_POST["isbn"];
    $descripcion = $_POST["descripcion"];

    $sql = "UPDATE libros SET nombre='$nombre', autor='$autor', isbn='$isbn', descripcion='$descripcion' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Datos modificados con éxito.";
    } else {
        echo "Error al modificar datos: " . $conn->error;
    }
}

$conn->close();
?>
