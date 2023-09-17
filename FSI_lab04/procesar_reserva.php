<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $habitacion = $_POST["habitacion"];
    $huespedes = $_POST["huespedes"];
    $fechaingreso = $_POST["fechaingreso"];
    $noches = $_POST["noches"];

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
    // Prepara la consulta SQL para insertar la reserva
    $sql = "INSERT INTO reservas (usuario_id, habitacion, huespedes, fechaingreso, noches)
            VALUES ('$usuario', '$habitacion', '$huespedes', '$fechaingreso', '$noches')";

    if ($conn->query($sql) === TRUE) {
        echo "Reserva realizada con éxito para el usuario $usuario.";
        // Redireccionar a la página de confirmación de reserva con los parámetros
        header("Location: confirmacion_reserva.php?usuario=$usuario&habitacion=$habitacion&huespedes=$huespedes&fechaingreso=$fechaingreso&noches=$noches");
        exit;
    } else {
        echo "Error al realizar la reserva: " . $conn->error;
    }

    $conn->close();
}
?>
