<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Consulta SQL para eliminar el usuario
        $sql = "DELETE FROM usuarios WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit;
        } else {
            echo "Error al eliminar el usuario: " . $conn->error;
        }
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>
