<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Obtener el ID del usuario a editar desde la URL
    $usuario_id = $_GET["id"];

    // Consulta SQL para obtener la información del usuario
    $sql = "SELECT * FROM usuarios WHERE id = $usuario_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Obtener los datos del usuario
        $row = $result->fetch_assoc();
        $nombres = $row["nombres"];
        $apellidos = $row["apellidos"];
        $dni = $row["dni"];
        $celular = $row["celular"];
    } else {
        echo "Usuario no encontrado.";
        exit;
    }
}
?>

<html>
<head>
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Editar Usuario</h2>
        <form method="POST" action="modify.php">
            <input type="hidden" name="id" value="<?php echo $usuario_id; ?>">
            <div class="form-group">
                <label for="nombres">Nombres:</label>
                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $nombres; ?>">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $apellidos; ?>">
            </div>
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $dni; ?>">
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $celular; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
