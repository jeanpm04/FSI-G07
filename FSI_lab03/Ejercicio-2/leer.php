<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Usuario</title>
</head>
<body>
    <?php
    include 'conexion.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        // Obtener información del usuario
        $query = "SELECT nombre, correo FROM usuarios WHERE id = $id";
        $result = $conexion->query($query);
        
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $nombre = $row['nombre'];
            $correo = $row['correo'];
            
            echo '<h1>Detalles del Usuario</h1>';
            echo '<p><strong>ID:</strong> ' . $id . '</p>';
            echo '<p><strong>Nombre:</strong> ' . $nombre . '</p>';
            echo '<p><strong>Correo Electrónico:</strong> ' . $correo . '</p>';
        } else {
            echo "Usuario no encontrado.";
        }
    } else {
        echo "ID de usuario no proporcionado.";
    }

    $conexion->close();
    ?>
    <br>
    <a href="index.php">Volver a la Lista de Usuarios</a>
</body>
</html>
