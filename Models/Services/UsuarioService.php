<?php

namespace Models\Services;

use Models\Repository\UsuarioRepository;
use Models\Entity\Usuario;
use Exception;

class UsuarioService {
    private UsuarioRepository $usuarioRepository;

    public function __construct() {
        $this->usuarioRepository = new UsuarioRepository();
    }

    public function registrar(string $nombre, string $email, string $password): bool {
        if ($this->usuarioRepository->findByEmail($email)) {
            throw new Exception("Ya existe un usuario con ese correo.");
        }

        $hash = password_hash($password, PASSWORD_BCRYPT);
        $usuario = new Usuario($nombre, $email, $hash);
        return $this->usuarioRepository->save($usuario);
    }

    public function login(string $email, string $password): bool {
        $usuario = $this->usuarioRepository->findByEmail($email);
        if ($usuario && password_verify($password, $usuario->getPasswordHash())) {
            $_SESSION['usuario'] = [
                'id' => $usuario->getId(),
                'nombre' => $usuario->getNombre()
            ];
            return true;
        }
        return false;
    }

    public function logout(): void {
        unset($_SESSION['usuario']);
    }

    public function estaLogueado(): bool {
        return isset($_SESSION['usuario']);
    }

    public function obtenerUsuarioActual(): ?array {
        return $_SESSION['usuario'] ?? null;
    }
}
