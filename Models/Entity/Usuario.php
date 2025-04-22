<?php

namespace Models\Entity;

class Usuario {
    private ?int $id = null;
    private string $nombre;
    private string $email;
    private string $passwordHash;

    public function __construct(string $nombre, string $email, string $passwordHash) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPasswordHash(): string {
        return $this->passwordHash;
    }
}
