<?php

namespace Models\Repository;

use Models\Entity\Usuario;
use ConnectionDBMySQL;
use PDO;

class UsuarioRepository {
    private $connection;

    public function __construct() {
        $this->connection = ConnectionDBMySQL::connection();
    }

    public function save(Usuario $usuario): bool {
        $query = "INSERT INTO usuarios (nombre, correo, password) VALUES (:nombre, :correo, :password)";
        $stmt = $this->connection->prepare($query);
        return $stmt->execute([
            'nombre' => $usuario->getNombre(),
            'correo' => $usuario->getCorreo(),
            'password' => $usuario->getPassword()
        ]);
    }

    public function findByCorreo(string $correo): ?Usuario {
        $query = "SELECT * FROM usuarios WHERE correo = :correo";
        $stmt = $this->connection->prepare($query);
        $stmt->execute(['correo' => $correo]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $usuario = new Usuario($row['nombre'], $row['correo'], $row['password']);
            $usuario->setId($row['id']);
            return $usuario;
        }
        return null;
    }
}
