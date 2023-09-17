<?php
include 'config.php';

if (!isset($_GET['id'])) {
    header("Location: lista_usuarios.php");
    exit;
}

$id = $_GET['id'];
?>

<html>
<head>
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Eliminar Usuario</h2>
        <form method="POST" action="delete.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <p>¿Estás seguro de que deseas eliminar este usuario?</p>
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="index.php" class="btn btn-primary">Cancelar</a>
        </form>
    </div>
</body>
</html>
