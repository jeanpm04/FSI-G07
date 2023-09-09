<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin-top: 50px;
        }
        h1 {
            color: #333;
        }
        form {
            max-width: 300px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    
    <?php
    session_start(); // Iniciar la sesión si no está iniciada
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre_usuario = $_POST["nombre_usuario"];
        $contraseña = $_POST["contraseña"];
        
        // Conectar a la base de datos
        $servername = "localhost";
        $username = "root"; // Nombre de usuario de la base de datos
        $password = ""; // No se utiliza contraseña
        $dbname = "libros"; // Nombre de la base de datos

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }
        
        $sql = "SELECT id, nombre_usuario, contraseña FROM usuarios WHERE nombre_usuario = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nombre_usuario);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $nombre_usuario, $contraseña_almacenada);
            $stmt->fetch();
            if ($contraseña === $contraseña_almacenada) {
                $_SESSION["id_usuario"] = $id;
                $_SESSION["nombre_usuario"] = $nombre_usuario;
                header("Location: inicio.html");
                exit;
            } else {
                echo "Nombre de usuario o contraseña incorrectos.";
            }
        } else {
            echo "Nombre de usuario o contraseña incorrectos.";
        }
        
        $stmt->close();
        $conn->close();
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nombre_usuario">Nombre de Usuario:</label>
        <input type="text" name="nombre_usuario" required><br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
