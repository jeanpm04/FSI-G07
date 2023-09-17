<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id = $_POST["id"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $celular = $_POST["celular"];

    // Consulta SQL para actualizar los datos del usuario
    $sql = "UPDATE usuarios SET nombres = '$nombres', apellidos = '$apellidos', dni = '$dni', celular = '$celular' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error al actualizar el usuario: " . $conn->error;
    }
}
?>
