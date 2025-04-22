<?php

namespace Models\Repository;

use Models\Entity\Usuario;
use Utils\ConnectionDBMySQL;
use PDO;

class UsuarioRepository {
    private $connection;

    public function __construct() {
        $this->connection = ConnectionDBMySQL::connection();
    }

    public function save(Usuario $usuario): bool {
        $stmt = $this->connection->prepare("INSERT INTO usuarios (nombre, email, password_hash) VALUES (:nombre, :email, :password)");
        return $stmt->execute([
            'nombre' => $usuario->getNombre(),
            'email' => $usuario->getEmail(),
            'password' => $usuario->getPasswordHash()
        ]);
    }

    public function findByEmail(string $email): ?Usuario {
        $stmt = $this->connection->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) return null;

        $usuario = new Usuario($row['nombre'], $row['email'], $row['password_hash']);
        $usuario->setId($row['id']);
        return $usuario;
    }
}
