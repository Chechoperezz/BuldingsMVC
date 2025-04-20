<?php

namespace Models\Repository;

use ConnectionDBMySQL;
use Models\Entity\Edificio;
use PDO;

class EdificioRepository
{

    private $connection;

    public function __construct(){
        $this->connection=ConnectionDBMySQL::connection();
    }

    public function findAll(){
        $query= "SELECT * FROM Edificios";
        $stmt = $this->connection->query($query);
        $edificios=[];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        }
        return $edificios;
    }

    public function findById($id) : ?Edificio{
        $query = "SELECT * FROM Edificios WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['id' => $id]);
        $edificio = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$edificio) {
            return null;
        }
    }

    public function save(Edificio $edificio)
    {
        if ($edificio->getId() === null) {

            $query = "INSERT INTO Edificios (nombre, metros_cuadrados, altura, numPisos, numApartamentos, numOficinas, nomParqueadero,
                                             numPiscinas, tieneAscensor, valorAdministracion, tieneZonaSocial, ubicacion_id) 
                      VALUES (:nombre, :metros_cuadrados, :altura, :numPisos, :numApartamentos, :numOficinas, :nomParqueadero, 
                              :numPiscinas, :tieneAscensor, :valorAdministracion, :tieneZonaSocial, :ubicacion_id)";

            $stmt = $this->connection->prepare($query);
            $success = $stmt->execute([
                'nombre' => $edificio->getNombre(),
                'metros_cuadrados' => $edificio->getMetrosCuadrados(),
                'altura' => $edificio->getAltura(),
                'numPisos' => $edificio->getNumPisos(),
                'numApartamentos' => $edificio->getNumApartamentos(),
                'numOficinas' => $edificio->getNumOficinas(),
                'nomParqueadero' => $edificio->getNomParqueaderos(),
                'numPiscinas' => $edificio->getNumPiscinas(),
                'tieneAscensor' => $edificio->isAscensor(),
                'valorAdministracion' => $edificio->getValorAdministracion(),
                'tieneZonaSocial' => $edificio->isZonaSocial(),
                'ubicacion_id' => $edificio->getUbicacion()
            ]);

            if ($success) {
                $edificio->setId($this->connection->lastInsertId());
            }
            return $success;
        } else {
            return $this->update($edificio);
        }
    }

    public function update(Edificio $edificio)
    {
        if ($edificio->getId() === null) {
            throw new Exception("El edificio no tiene ID.");
        }

        $query = "UPDATE Edificios SET nombre = :nombre, metros_cuadrados = :metros_cuadrados, 
                     altura = :altura, numPisos = :numPisos, numApartamentos = :numApartamentos,
                     numOficinas = :numOficinas, nomParqueadero = :nomParqueadero,
                     numPiscinas = :numPiscinas, tieneAscensor = :tieneAscensor, 
                     valorAdministracion = :valorAdministracion,
                     tieneZonaSocial = :tieneZonaSocial, ubicacion_id = :ubicacion_id WHERE id = :id";

        $stmt = $this->connection->prepare($query);

        $stmt->execute([
            'nombre' => $edificio->getNombre(),
            'metros_cuadrados' => $edificio->getMetrosCuadrados(),
            'altura' => $edificio->getAltura(),
            'numPisos' => $edificio->getNumPisos(),
            'numApartamentos' => $edificio->getNumApartamentos(),
            'numOficinas' => $edificio->getNumOficinas(),
            'nomParqueadero' => $edificio->getNomParqueaderos(),
            'numPiscinas' => $edificio->getNumPiscinas(),
            'tieneAscensor' => $edificio->isAscensor(),
            'valorAdministracion' => $edificio->getValorAdministracion(),
            'tieneZonaSocial' => $edificio->isZonaSocial(),
            'ubicacion_id' => $edificio->getUbicacion(),
            'id' => $edificio->getId()
        ]);

        return $stmt->rowCount() > 0;
    }
}