<?php

namespace Models\Entity;

class Apartamentos
{
    private ?int $id=null;
    private int $num_apartamento;
    private float $metros_cuadrados;

    public function __construct(int $num_apartamento , float $metros_cuadrados)
    {
        $this->num_apartamento = $num_apartamento;
        $this->metros_cuadrados = $metros_cuadrados;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNumApartamento(): int {
        return $this->num_apartamento;}

    public function setNumApartamento(int $num_apartamento){
        $this->num_apartamento = $num_apartamento;
    }

    public function getMetrosCuadrados(): float {
        return $this->metros_cuadrados;}

    public function setMetrosCuadrados(float $metros_cuadrados){
        $this->metros_cuadrados = $metros_cuadrados;
    }
}
?>