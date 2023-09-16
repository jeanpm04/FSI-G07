<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["nuevo_dni"];
    $celular = $_POST["nuevo_celular"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hotel";

    // Crea una conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    // Prepara la consulta SQL para insertar el nuevo usuario
    $sql = "INSERT INTO usuarios (nombres, apellidos, dni, celular)
            VALUES ('$nombres', '$apellidos', '$dni', '$celular')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo usuario registrado con éxito.";
    } else {
        echo "Error al registrar el nuevo usuario: " . $conn->error;
    }

    $conn->close();
}
?>
