<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Edificio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Crear Nuevo Edificio</h2>
        <form action="/edificio/guardar" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Edificio</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="metrosCuadrados" class="form-label">Metros Cuadrados</label>
                <input type="number" class="form-control" id="metrosCuadrados" name="metrosCuadrados" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="altura" class="form-label">Altura</label>
                <input type="number" class="form-control" id="altura" name="altura" step="0.1" required>
            </div>
            <div class="mb-3">
                <label for="numPisos" class="form-label">Número de Pisos</label>
                <input type="number" class="form-control" id="numPisos" name="numPisos" required>
            </div>
            <div class="mb-3">
                <label for="numApartamentos" class="form-label">Número de Apartamentos</label>
                <input type="number" class="form-control" id="numApartamentos" name="numApartamentos" required>
            </div>
            <div class="mb-3">
                <label for="numOficinas" class="form-label">Número de Oficinas</label>
                <input type="number" class="form-control" id="numOficinas" name="numOficinas" required>
            </div>
            <div class="mb-3">
                <label for="numPiscinas" class="form-label">Número de Piscinas</label>
                <input type="number" class="form-control" id="numPiscinas" name="numPiscinas" required>
            </div>
            <div class="mb-3">
                <label for="tieneAscensor" class="form-label">¿Tiene Ascensor?</label>
                <select class="form-control" id="tieneAscensor" name="tieneAscensor">
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="valorAdministracion" class="form-label">Valor de Administración</label>
                <input type="number" class="form-control" id="valorAdministracion" name="valorAdministracion" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="zonaSocial" class="form-label">¿Tiene Zona Social?</label>
                <select class="form-control" id="zonaSocial" name="zonaSocial">
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="municipio_id" class="form-label">Municipio</label>
                <input type="number" class="form-control" id="municipio_id" name="municipio_id" required>
            </div>
            <div class="mb-3">
                <label for="direccionExacta" class="form-label">Dirección Exacta</label>
                <input type="text" class="form-control" id="direccionExacta" name="direccionExacta" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Edificio</button>
        </form>
    </div>
</body>
</html>
