<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Edificios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Listado de Edificios</h2>
    <a href="/edificio/crear" class="btn btn-success mb-3">Crear Nuevo Edificio</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Altura</th>
            <th>Número de Pisos</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php if (isset($edificios) && count($edificios) > 0): ?>
            <?php foreach ($edificios as $edificio): ?>
                <tr>
                    <td><?php echo $edificio->getId(); ?></td>
                    <td><?php echo $edificio->getNombre(); ?></td>
                    <td><?php echo $edificio->getAltura(); ?> m</td>
                    <td><?php echo $edificio->getNumPisos(); ?></td>
                    <td>
                        <a href="/edificio/editar/<?php echo $edificio->getId(); ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="/edificio/eliminar/<?php echo $edificio->getId(); ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">No se encontraron edificios.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>



