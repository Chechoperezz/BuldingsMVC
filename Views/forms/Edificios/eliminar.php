<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Edificio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>¿Estás seguro de que deseas eliminar este edificio?</h2>
    <p><strong>Nombre del Edificio:</strong> <?php echo $edificio->getNombre(); ?></p>
    <form action="/edificio/eliminar/<?php echo $edificio->getId(); ?>" method="POST">
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a href="/edificio/listado" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>

