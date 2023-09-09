<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $autor = $_POST["autor"];
    $isbn = $_POST["isbn"];
    $descripcion = $_POST["descripcion"];

    if (!is_numeric($id)) {
        echo "El valor del ID debe ser numérico.";
    } else {
        $sql = "INSERT INTO libros (id, nombre, autor, isbn, descripcion) VALUES ('$id', '$nombre', '$autor', '$isbn', '$descripcion')";

        if ($conn->query($sql) === TRUE) {
            echo "Libro insertado con éxito.";
        } else {
            echo "Error al insertar libro: " . $conn->error;
        }
    }
}

$conn->close();
?>
