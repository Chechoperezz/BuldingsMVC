<?php

namespace Models\Entity;
class Edificio {
    private ?int $id = null;
    private string $nombre;

    private float $metrosCuadrados;

    private float $altura;

    private int $numPisos;

    private int $numApartamentos;

    private  int $numOficinas;

    private ?string $nomParqueaderos;

    private int $numPiscinas;

    private bool $ascensor;

    private float $valorAdministracion;

    private bool $zonaSocial;

    private int $ubicacion;


    public function __construct(string $nombre, float $metrosCuadrados, float $altura,
                                int $numPisos, int $numApartamentos,
                                int $numOficinas, string $nomParqueaderos,
                                int $numPiscinas, bool $ascensor, float $valorAdministracion,
                                bool $zonaSocial, int $ubicacion){

        $this->nombre=$nombre;
        $this->metrosCuadrados=$metrosCuadrados;
        $this->altura=$altura;
        $this->numPisos=$numPisos;
        $this->numApartamentos=$numApartamentos;
        $this->numOficinas=$numOficinas;
        $this->nomParqueaderos=$nomParqueaderos;
        $this->numPiscinas=$numPiscinas;
        $this->ascensor=$ascensor;
        $this->valorAdministracion=$valorAdministracion;
        $this->zonaSocial=$zonaSocial;
        $this->ubicacion=$ubicacion;

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getMetrosCuadrados(): float
    {
        return $this->metrosCuadrados;
    }

    public function setMetrosCuadrados(float $metrosCuadrados): void
    {
        $this->metrosCuadrados = $metrosCuadrados;
    }

    public function getAltura(): float
    {
        return $this->altura;
    }

    public function setAltura(float $altura): void
    {
        $this->altura = $altura;
    }

    public function getNumPisos(): int
    {
        return $this->numPisos;
    }

    public function setNumPisos(int $numPisos): void
    {
        $this->numPisos = $numPisos;
    }

    public function getNumApartamentos(): int
    {
        return $this->numApartamentos;
    }

    public function setNumApartamentos(int $numApartamentos): void
    {
        $this->numApartamentos = $numApartamentos;
    }

    public function getNumOficinas(): int
    {
        return $this->numOficinas;
    }

    public function setNumOficinas(int $numOficinas): void
    {
        $this->numOficinas = $numOficinas;
    }

    public function getNomParqueaderos(): ?string
    {
        return $this->nomParqueaderos;
    }

    public function setNomParqueaderos(?string $nomParqueaderos): void
    {
        $this->nomParqueaderos = $nomParqueaderos;
    }

    public function getNumPiscinas(): int
    {
        return $this->numPiscinas;
    }

    public function setNumPiscinas(int $numPiscinas): void
    {
        $this->numPiscinas = $numPiscinas;
    }

    public function isAscensor(): bool
    {
        return $this->ascensor;
    }

    public function setAscensor(bool $ascensor): void
    {
        $this->ascensor = $ascensor;
    }

    public function getValorAdministracion(): float
    {
        return $this->valorAdministracion;
    }

    public function setValorAdministracion(float $valorAdministracion): void
    {
        $this->valorAdministracion = $valorAdministracion;
    }

    public function isZonaSocial(): bool
    {
        return $this->zonaSocial;
    }

    public function setZonaSocial(bool $zonaSocial): void
    {
        $this->zonaSocial = $zonaSocial;
    }

    public function getUbicacion(): int
    {
        return $this->ubicacion;
    }

    public function setUbicacion(int $ubicacion): void
    {
        $this->ubicacion = $ubicacion;
    }

}
?>
