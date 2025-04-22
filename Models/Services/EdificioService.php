<?php

namespace Models\Services;

use Models\Entity\Edificio;
use Models\Repository\EdificioRepository;
use Exception;
class EdificioService
{
    private EdificioRepository $edificioRepository;

    public function __construct()
    {
        $this->edificioRepository = new EdificioRepository();
    }

    public function getAllEdificios(): array
    {
        return $this->edificioRepository->findAll();
    }

    public function getEdificioById(int $id): ?Edificio
    {
        return $this->edificioRepository->findById($id);
    }

    public function createEdificio(Edificio $edificio)
    {
        if ($edificio->getId() != null) {
            throw new Exception("El id del edificio NO debe ser asignado manualmente.");
        }
        if (empty($edificio->getNombre()) || $this->edificioRepository->findByName($edificio->getNombre()) != null) {
            throw new Exception("El nombre del edificio no es válido o ya existe.");
        }

        if ($edificio->getMetrosCuadrados() <= 0) {
            throw new Exception("Los metros cuadrados deben ser mayores a 0.");
        }

        if ($edificio->getAltura() <= 0) {
            throw new Exception("La altura debe ser mayor a 0.");
        }

        if ($edificio->getNumPisos() < 1) {
            throw new Exception("El número de pisos debe ser al menos 1.");
        }

        if ($edificio->getNumApartamentos() < 0) {
            throw new Exception("El número de apartamentos no puede ser negativo.");
        }

        if ($edificio->getNumOficinas() < 0) {
            throw new Exception("El número de oficinas no puede ser negativo.");
        }

        if ($edificio->getNumPiscinas() < 0) {
            throw new Exception("El número de piscinas no puede ser negativo.");
        }

        if ($edificio->getValorAdministracion() < 0) {
            throw new Exception("El valor de administración no puede ser negativo.");
        }

        if ($edificio->getAscensor()<0) {
            throw new Exception("El numero de ascensor no puede  ser negativo.");
        }

        if ($edificio->getZonaSocial()<0) {
            throw new Exception("El numero de zonas sociales no debe ser negativo .");
        }

        if ($edificio->getMunicipioId() <= 0) {
            throw new Exception("Debe seleccionarse un municipio válido.");
        }

        if (empty($edificio->getDireccionExacta())) {
            throw new Exception("La dirección exacta es obligatoria.");
        }

        return $this->edificioRepository->save($edificio);
    }

    public function updateEdificio(Edificio $edificio)
    {
        if($this->edificioRepository->findById($edificio->getId()) == null){
            throw new Exception("El edificio no existe.");
        }

        return $this ->edificioRepository->update($edificio);
    }

    public function deleteEdificio(int $id): bool
    {
        if ($this->edificioRepository->findById($id) === null) {
            throw new Exception("El edificio con ID $id no existe.");
        }

        return $this->edificioRepository->delete($id);
    }


}


