<?php

namespace Models\Entity;
class Oficinas
{
    private ?int $id=null;
    private int $num_oficina;
    private float $metros_cuadrados;

    public function __construct(int $num_oficina , float $metros_cuadrados)
    {
        $this->num_oficina = $num_oficina;
        $this->metros_cuadrados = $metros_cuadrados;
    }

    public function getId() : int {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }



    public function getNumOficina() : int {
        return $this->num_oficina;
    }

    public function setNumOficina(int $num_oficina){
        $this->num_oficina=$num_oficina;
    }

    public function getMetrosCuadrados() : float {
        return $this->metros_cuadrados;
    }

    public function setMetrosCuadrados(int $metros_cuadrados){
        $this->metros_cuadrados=$metros_cuadrados;
    }



}
?>