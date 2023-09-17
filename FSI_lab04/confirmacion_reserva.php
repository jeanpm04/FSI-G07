<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Reserva</title>
</head>
<body>
    <h2>Datos de la Reserva</h2>
    <p>Usuario: <?php echo $_GET["usuario"]; ?></p>
    <p>Habitación: <?php echo $_GET["habitacion"]; ?></p>
    <p>N° de Huéspedes: <?php echo $_GET["huespedes"]; ?></p>
    <p>Fecha de Entrada: <?php echo $_GET["fechaingreso"]; ?></p>
    <p>Noches: <?php echo $_GET["noches"]; ?></p>
</body>
</html>
