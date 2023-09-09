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
    } else {
        echo "Usuario no encontrado.";
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar la actualización del usuario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    
    $query = "UPDATE usuarios SET nombre = '$nombre', correo = '$correo' WHERE id = $id";
    
    if ($conexion->query($query) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error al actualizar el usuario: " . $conexion->error;
    }
}

$conexion->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>"><br>
        
        <label for="correo">Correo Electrónico:</label>
        <input type="text" name="correo" value="<?php echo $correo; ?>"><br>
        
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
