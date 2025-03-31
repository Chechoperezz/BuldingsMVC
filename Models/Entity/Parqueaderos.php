<?php

namespace Models\Entity;
class Parqueaderos
{

    private ?int $id=null;
    private string $nombre;
    private int $num_espacios;

    public function __construct(string $nombre, int $num_espacios){
        $this->nombre=$nombre;
        $this->num_espacios=$num_espacios;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }



    public function getNombre() : string {
        return $this->nombre;
    }
    public function getNumEspacios() : int {
        return $this->num_espacios;
    }

    public function setNombre(string $nombre){
        $this->nombre=$nombre;
    }

    public function setNumEspacios(int $num_espacios){
        $this->num_espacios=$num_espacios;
    }
}
?>