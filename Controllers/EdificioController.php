<?php

namespace Controllers;

use Models\Services\EdificioService;
use Models\Entity\Edificio;
use Exception;
class EdificioController
{
    private EdificioService $edificioService;


    public function __construct() {
        session_start();
        $this->edificioService = new EdificioService();
    }

    public function listar()
    {
        try {
            $edificios = $this->edificioService->getAllEdificios();
            require __DIR__ . '/../Views/forms/edificios/listar.php';
        } catch (Exception $e) {
            echo "Error al listar edificios: " . $e->getMessage();
        }
    }
    public function buscarPorId(): void
    {

        if (! isset($_GET['id'])) {
            $error = null;
            require __DIR__ . '/../Views/forms/edificios/buscar.php';
            return;
        }


        $id = intval($_GET['id']);
        try {
            $edificio = $this->edificioService->getEdificioById($id);
            if ($edificio) {

                require __DIR__ . '/../Views/forms/edificios/verPorId.php';
            } else {
                $error = "No existe un edificio con ID $id.";
                require __DIR__ . '/../Views/forms/edificios/buscar.php';
            }
        } catch (Exception $e) {
            $error = "Error al buscar: " . $e->getMessage();
            require __DIR__ . '/../Views/forms/edificios/buscar.php';
        }
    }

    public function crear(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $d = $_POST;

            try {
                $edificio = new Edificio(
                    $d['nombre'],
                    floatval($d['metrosCuadrados']),
                    floatval($d['altura']),
                    intval($d['numPisos']),
                    intval($d['numApartamentos']),
                    intval($d['numOficinas']),
                    $d['nomParqueadero'] ?? null,
                    intval($d['numPiscinas']),
                    intval($d['tieneAscensor'] ?? 0),
                    floatval($d['valorAdministracion']),
                    intval($d['tieneZonaSocial'] ?? 0),
                    $d['direccionExacta'],
                    intval($d['municipio_id'])
                );

                $success = $this->edificioService->createEdificio($edificio);

                if (! $success) {
                    throw new Exception("No se pudo guardar el edificio en la base de datos.");
                }

                header('Location: index.php?controller=edificio&action=listar');
                exit;

            } catch (Exception $e) {
                $error = $e->getMessage();
                require __DIR__ . '/../Views/forms/edificios/crear.php';
            }

        } else {

            require __DIR__ . '/../Views/forms/edificios/crear.php';
        }
    }

    public function actualizar()
        {
            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $edificio = $this->edificioService->getEdificioById($id);

                if (!$edificio) {
                    $error = "No existe un edificio con ID $id.";
                    require __DIR__ . '/../Views/forms/edificios/buscar.php';
                } else {
                    require __DIR__ . '/../Views/forms/edificios/editar.php';
                }
                return;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $datos = $_POST;
                $edificio = $this->edificioService->getEdificioById(intval($datos['id']));

                if (!$edificio) {
                    echo "Error: el edificio no existe.";
                    return;
                }


                $edificio->setNombre($datos['nombre'] ?: $edificio->getNombre());
                $edificio->setMetrosCuadrados(
                    $datos['metrosCuadrados'] !== ''
                        ? floatval($datos['metrosCuadrados'])
                        : $edificio->getMetrosCuadrados()
                );
                $edificio->setAltura(
                    $datos['altura'] !== ''
                        ? floatval($datos['altura'])
                        : $edificio->getAltura()
                );
                $edificio->setNumPisos(
                    $datos['numPisos'] !== ''
                        ? intval($datos['numPisos'])
                        : $edificio->getNumPisos()
                );
                $edificio->setNumApartamentos(
                    $datos['numApartamentos'] !== ''
                        ? intval($datos['numApartamentos'])
                        : $edificio->getNumApartamentos()
                );
                $edificio->setNumOficinas(
                    $datos['numOficinas'] !== ''
                        ? intval($datos['numOficinas'])
                        : $edificio->getNumOficinas()
                );
                $edificio->setNomParqueadero(
                    $datos['nomParqueadero'] !== ''
                        ? $datos['nomParqueadero']
                        : $edificio->getNomParqueadero()
                );
                $edificio->setNumPiscinas(
                    $datos['numPiscinas'] !== ''
                        ? intval($datos['numPiscinas'])
                        : $edificio->getNumPiscinas()
                );
                $edificio->setAscensor(
                    $datos['numAscensor'] !== ''
                        ? intval($datos['numAscensor'])
                        : $edificio->getAscensor()
                );
                $edificio->setValorAdministracion(
                    $datos['valorAdministracion'] !== ''
                        ? floatval($datos['valorAdministracion'])
                        : $edificio->getValorAdministracion()
                );
                $edificio->setZonaSocial(
                    $datos['numZonaSocial'] !== ''
                        ? intval($datos['numZonaSocial'])
                        : $edificio->getZonaSocial()
                );

                $edificio->setDireccionExacta(
                    $datos['direccionExacta'] !== ''
                        ? $datos['direccionExacta']
                        : $edificio->getDireccionExacta()
                );
                $edificio->setMunicipioId(
                    $datos['municipio_id'] !== ''
                        ? intval($datos['municipio_id'])
                        : $edificio->getMunicipioId()
                );

                try {
                    $this->edificioService->updateEdificio($edificio);
                    header('Location: index.php?controller=edificio&action=listar');
                    exit();
                } catch (Exception $e) {
                    $error = $e->getMessage();
                    require __DIR__ . '/../Views/forms/edificios/editar.php';
                }
            }
        }
}