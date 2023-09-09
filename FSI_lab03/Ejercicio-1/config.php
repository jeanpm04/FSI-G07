<?php
$servername = "localhost";   // Dirección del servidor
$username = "root";    // Nombre de usuario predeterminado "root"
$password = ""; // Contraseña de la base de datos
$dbname = "libros"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
