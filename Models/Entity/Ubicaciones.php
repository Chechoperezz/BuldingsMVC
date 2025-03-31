<?php

namespace Models\Entity;
class Ubicaciones
{

    private ?int $id=null;
    private string $pais;
    private string $ciudad;
    private string $departamento;


    public function __construct(string $pais, string $ciudad, string $departamento)
    {
        $this->pais = $pais;
        $this->ciudad = $ciudad;
        $this->departamento = $departamento;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPais(): string
    {
        return $this->pais;
    }

    public function setPais(string $pais): void
    {
        $this->pais = $pais;
    }

    public function getCiudad(): string
    {
        return $this->ciudad;
    }

    public function setCiudad(string $ciudad): void
    {
        $this->ciudad = $ciudad;
    }

    public function getDepartamento(): string
    {
        return $this->departamento;
    }

    public function setDepartamento(string $departamento): void
    {
        $this->departamento = $departamento;
    }

}
?>