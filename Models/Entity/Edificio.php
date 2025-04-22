<?php

namespace Models\Entity;
class Edificio {
    private ?int $id = null;
    private string $nombre;
    private float $metrosCuadrados;
    private float $altura;
    private int $numPisos;
    private int $numApartamentos;
    private int $numOficinas;
    private ?string $nomParqueadero;
    private int $numPiscinas;
    private int $ascensor;
    private float $valorAdministracion;
    private int $zonaSocial;
    private string $direccionExacta;
    private int $municipioId;

    public function __construct(string $nombre, float $metrosCuadrados, float $altura, int $numPisos, int $numApartamentos,
                                int $numOficinas, ?string $nomParqueadero, int $numPiscinas, int $ascensor,
                                float $valorAdministracion, int $zonaSocial, string $direccionExacta, int $municipioId
    ) {
        $this->nombre = $nombre;
        $this->metrosCuadrados = $metrosCuadrados;
        $this->altura = $altura;
        $this->numPisos = $numPisos;
        $this->numApartamentos = $numApartamentos;
        $this->numOficinas = $numOficinas;
        $this->nomParqueadero = $nomParqueadero;
        $this->numPiscinas = $numPiscinas;
        $this->ascensor = $ascensor;
        $this->valorAdministracion = $valorAdministracion;
        $this->zonaSocial = $zonaSocial;
        $this->direccionExacta = $direccionExacta;
        $this->municipioId = $municipioId;
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

    public function getNomParqueadero(): ?string
    {
        return $this->nomParqueadero;
    }

    public function setNomParqueadero(?string $nomParqueadero): void
    {
        $this->nomParqueadero = $nomParqueadero;
    }

    public function getNumPiscinas(): int
    {
        return $this->numPiscinas;
    }

    public function setNumPiscinas(int $numPiscinas): void
    {
        $this->numPiscinas = $numPiscinas;
    }

    public function getAscensor(): int
    {
        return $this->ascensor;
    }

    public function setAscensor(int $ascensor): void
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

    public function getZonaSocial(): int
    {
        return $this->zonaSocial;
    }

    public function setZonaSocial(int $zonaSocial): void
    {
        $this->zonaSocial = $zonaSocial;
    }

    public function getDireccionExacta(): string
    {
        return $this->direccionExacta;
    }

    public function setDireccionExacta(string $direccionExacta): void
    {
        $this->direccionExacta = $direccionExacta;
    }

    public function getMunicipioId(): int
    {
        return $this->municipioId;
    }

    public function setMunicipioId(int $municipioId): void
    {
        $this->municipioId = $municipioId;
    }




}
?>
