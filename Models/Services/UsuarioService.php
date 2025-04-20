<?php

namespace Models\Services;

use Models\Entity\Usuario;
use Models\Repository\UsuarioRepository;
use Exception;

class UsuarioService {
    private UsuarioRepository $usuarioRepository;

    public function __construct() {
        $this->usuarioRepository = new UsuarioRepository();
    }

    public function registrar(Usuario $usuario): bool {
        if ($this->usuarioRepository->findByCorreo($usuario->getCorreo())) {
            throw new Exception("El correo ya está registrado.");
        }


        $usuario->setPassword(password_hash($usuario->getPassword(), PASSWORD_BCRYPT));

        return $this->usuarioRepository->save($usuario);
    }

    public function login(string $correo, string $password): bool {
        $usuario = $this->usuarioRepository->findByCorreo($correo);
        if ($usuario && password_verify($password, $usuario->getPassword())) {
            $_SESSION['usuario'] = [
                'id' => $usuario->getId(),
                'nombre' => $usuario->getNombre(),
                'correo' => $usuario->getCorreo()
            ];
            return true;
        }

        return false;
    }

    public function logout() {
        session_destroy();
    }

    public function isLoggedIn(): bool {
        return isset($_SESSION['usuario']);
    }

    public function getUsuarioActual(): ?array {
        return $_SESSION['usuario'] ?? null;
    }
}

