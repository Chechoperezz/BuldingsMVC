<?php

namespace Models\Repository;

use  Utils\ConnectionDBMySQL;
use Models\Entity\Edificio;
use PDO;

class EdificioRepository
{

    private $connection;

    public function __construct(){
        $this->connection=ConnectionDBMySQL::connection();
    }

    public function save(Edificio $edificio): bool
    {
        $sql = "
        INSERT INTO Edificios (nombre,metrosCuadrados,altura,numPisos,numApartamentos,
                               numOficinas,nomParqueadero,numPiscinas,tieneAscensor,
                               valorAdministracion,tieneZonaSocial,municipio_id,direccionExacta
        ) VALUES (
            :nombre,:metrosCuadrados,:altura,:numPisos,:numApartamentos,
            :numOficinas,:nomParqueadero,:numPiscinas,:tieneAscensor,
            :valorAdministracion,:tieneZonaSocial,:municipio_id,:direccionExacta
        ) ";

        $stmt = $this->connection->prepare($sql);

        $params = [
            'nombre'              => $edificio->getNombre(),
            'metrosCuadrados'     => $edificio->getMetrosCuadrados(),
            'altura'              => $edificio->getAltura(),
            'numPisos'            => $edificio->getNumPisos(),
            'numApartamentos'     => $edificio->getNumApartamentos(),
            'numOficinas'         => $edificio->getNumOficinas(),
            'nomParqueadero'      => $edificio->getNomParqueadero(),
            'numPiscinas'         => $edificio->getNumPiscinas(),
            'tieneAscensor'       => $edificio->getAscensor(),
            'valorAdministracion' => $edificio->getValorAdministracion(),
            'tieneZonaSocial'     => $edificio->getZonaSocial(),
            'municipio_id'        => $edificio->getMunicipioId(),
            'direccionExacta'     => $edificio->getDireccionExacta(),
        ];

        $success = $stmt->execute($params);

        if (!$success) {
            $error = $stmt->errorInfo();
            echo '<pre> SQL ERROR: ', print_r($error, true), '</pre>';
            return false;
        }
        $edificio->setId((int)$this->connection->lastInsertId());
        return true;
    }

    public function update(Edificio $edificio): bool {
        if ($edificio->getId() === null) {
            throw new \Exception("El edificio no tiene ID.");
        }

        $sql = "
            UPDATE Edificios SET
                nombre = :nombre,
                metrosCuadrados = :metrosCuadrados,
                altura = :altura,
                numPisos = :numPisos,
                numApartamentos = :numApartamentos,
                numOficinas = :numOficinas,
                nomParqueadero = :nomParqueadero,
                numPiscinas = :numPiscinas,
                tieneAscensor = :tieneAscensor,
                valorAdministracion = :valorAdministracion,
                tieneZonaSocial = :tieneZonaSocial,
                direccionExacta = :direccionExacta,
                municipio_id = :municipio_id
            WHERE id = :id";

        $stmt = $this->connection->prepare($sql);
        $params = [
            'nombre'              => $edificio->getNombre(),
            'metrosCuadrados'     => $edificio->getMetrosCuadrados(),
            'altura'              => $edificio->getAltura(),
            'numPisos'            => $edificio->getNumPisos(),
            'numApartamentos'     => $edificio->getNumApartamentos(),
            'numOficinas'         => $edificio->getNumOficinas(),
            'nomParqueadero'      => $edificio->getNomParqueadero(),
            'numPiscinas'         => $edificio->getNumPiscinas(),
            'tieneAscensor'       => $edificio->getAscensor(),
            'valorAdministracion' => $edificio->getValorAdministracion(),
            'tieneZonaSocial'     => $edificio->getZonaSocial(),
            'direccionExacta'     => $edificio->getDireccionExacta(),
            'municipio_id'        => $edificio->getMunicipioId(),
            'id'                  => $edificio->getId()
        ];

        $stmt->execute($params);
        return $stmt->rowCount() > 0;
    }

    public function findAll()
    {
        $query = "SELECT * FROM Edificios";
        $stmt = $this->connection->query($query);
        $edificios = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $edificio = new Edificio(
                $row['nombre'],
                floatval($row['metrosCuadrados']),
                floatval($row['altura']),
                intval($row['numPisos']),
                intval($row['numApartamentos']),
                intval($row['numOficinas']),
                $row['nomParqueadero'],
                intval($row['numPiscinas']),
                intval($row['tieneAscensor']),
                floatval($row['valorAdministracion']),
                intval($row['tieneZonaSocial']),
                $row['direccionExacta'],
                intval($row['municipio_id'])
            );

            $edificio->setId((int)$row['id']);
            $edificios[] = $edificio;
        }

        return $edificios;
    }
    public function findById($id) : ?Edificio{
        $query = "SELECT * FROM Edificios WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }

        $edificio = new Edificio(
            $row['nombre'],
            floatval($row['metrosCuadrados']),
            floatval($row['altura']),
            intval($row['numPisos']),
            intval($row['numApartamentos']),
            intval($row['numOficinas']),
            $row['nomParqueadero'],
            intval($row['numPiscinas']),
            intval($row['tieneAscensor']),
            floatval($row['valorAdministracion']),
            intval($row['tieneZonaSocial']),
            $row['direccionExacta'],
            intval($row['municipio_id'])
        );
        $edificio->setId((int)$row['id']);

        return $edificio;

    }


    public function findByName($nombre) : ?Edificio{
        $query = "SELECT * FROM Edificios WHERE nombre = :nombre";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['nombre' => $nombre]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            return null;
        }

        return new Edificio(
            $row['nombre'],
            floatval($row['metrosCuadrados']),
            floatval($row['altura']),
            intval($row['numPisos']),
            intval($row['numApartamentos']),
            intval($row['numOficinas']),
            $row['nomParqueadero'],
            intval($row['numPiscinas']),
            intval($row['tieneAscensor']),
            floatval($row['valorAdministracion']),
            intval($row['tieneZonaSocial']),
            $row['direccionExacta'],
            intval($row['municipio_id'])
        );
    }


    public function delete(int $id): bool {
        $stmt = $this->connection->prepare("DELETE FROM Edificios WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

}