<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM libros WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Libro eliminado con éxito.";
    } else {
        echo "Error al eliminar libro: " . $conn->error;
    }
}

$conn->close();
?>
