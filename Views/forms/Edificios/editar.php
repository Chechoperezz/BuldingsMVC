<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Edificio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Editar Edificio</h2>
    <form action="/edificio/actualizar" method="POST">
        <input type="hidden" name="id" value="<?php echo $edificio->getId(); ?>">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Edificio</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $edificio->getNombre(); ?>" required>
        </div>
        <div class="mb-3">
            <label for="metrosCuadrados" class="form-label">Metros Cuadrados</label>
            <input type="number" class="form-control" id="metrosCuadrados" name="metrosCuadrados" step="0.01" value="<?php echo $edificio->getMetrosCuadrados(); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Edificio</button>
    </form>
</div>
</body>
</html>


