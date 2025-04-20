<?php

namespace Models\Entity;

class Usuario {
    private ?int $id = null;
    private string $nombre;
    private string $correo;
    private string $password;

    public function __construct(string $nombre, string $correo, string $password) {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->password = $password;
    }

    public function getId(): ?int { return $this->id; }
    public function setId(int $id): void { $this->id = $id; }

    public function getNombre(): string { return $this->nombre; }
    public function getCorreo(): string { return $this->correo; }
    public function getPassword(): string { return $this->password; }

    public function setPassword(string $password): void {
        $this->password = $password;
    }
}
