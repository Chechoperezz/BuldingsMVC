<?php

namespace Controllers;

use Models\Services\EdificioService;
include 'Views/edificio/listar.php';
class EdificioController
{
    private EdificioService $edificioService;

    public function __construct()
    {
        $this->edificioService = new EdificioService();
    }


    public function crear(array $datos)
    {
        try {

            $edificio = new Edificio(
                null,
                $datos['nombre'],
                floatval($datos['metrosCuadrados']),
                floatval($datos['altura']),
                intval($datos['numPisos']),
                intval($datos['numApartamentos']),
                intval($datos['numOficinas']),
                $datos['nomParqueadero'] ?? null,
                intval($datos['numPiscinas']),
                intval($datos['tieneAscensor']),
                floatval($datos['valorAdministracion']),
                intval($datos['tieneZonaSocial']),
                intval($datos['municipio_id']),
                $datos['direccionExacta']
            );


            $this->edificioService->createEdificio($edificio);

            echo "Edificio creado correctamente.";
        } catch (Exception $e) {
            echo "Error al crear el edificio: " . $e->getMessage();
        }
    }

    public function actualizar(array $datos)
    {

        $edificio = new Edificio(
            null,
            $datos['nombre'],
            floatval($datos['metrosCuadrados']),
            floatval($datos['altura']),
            intval($datos['numPisos']),
            intval($datos['numApartamentos']),
            intval($datos['numOficinas']),
            $datos['nomParqueadero'] ?? null,
            intval($datos['numPiscinas']),
            intval($datos['tieneAscensor']),
            floatval($datos['valorAdministracion']),
            intval($datos['tieneZonaSocial']),
            intval($datos['municipio_id']),
            $datos['direccionExacta']
        );
        $edificio->setId((int)$datos['id']);

        $this->edificioService->updateEdificio($edificio);
        echo "Edificio actualizado correctamente.";

    }

    public function listar()
    {
        try {

            $edificios = $this->edificioService->getAllEdificios();

            if ($edificios === null) {
                throw new Exception("No se encontraron edificios.");
            }


            include 'Views/edificio/listar.php';
        } catch (Exception $e) {
            echo "Error al listar edificios: " . $e->getMessage();
        }
    }


    public function verPorId(int $id)
    {
        try {
            $edificio = $this->edificioService->getEdificioById($id);
            if ($edificio) {
                header('Content-Type: application/json');
                echo json_encode($edificio);
            } else {
                echo "No se encontró un edificio con el ID proporcionado.";
            }
        } catch (Exception $e) {
            echo "Error al obtener el edificio: " . $e->getMessage();
        }
    }
}