<!DOCTYPE html>
<html>
<head>
    <title>CRUD de Usuarios</title>
</head>
<body>
    <?php
    include 'conexion.php';

    // Mostrar la tabla de usuarios
    $query = "SELECT id, nombre FROM usuarios";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        echo '<h1>Lista de Usuarios</h1>';
        echo '<table border="1">
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                  <td>' . $row['id'] . '</td>
                  <td>' . $row['nombre'] . '</td>
                  <td>
                    <a href="editar.php?id=' . $row['id'] . '">Modificar</a> |
                    <a href="eliminar.php?id=' . $row['id'] . '">Eliminar</a> |
                    <a href="leer.php?id=' . $row['id'] . '">Leer</a>
                  </td>
                </tr>';
        }
        echo '</table>';
    } else {
        echo '<h1>No hay usuarios en la base de datos.</h1>';
    }
    ?>

    <h1>Agregar Usuario</h1>
    <form method="POST" action="agregar.php">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>
        
        <label for="correo">Correo Electrónico:</label>
        <input type="email" name="correo" required><br>
        
        <input type="submit" value="Agregar Usuario">
    </form>
</body>
</html>
