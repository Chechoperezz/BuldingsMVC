<?php

namespace Controllers;

use Models\Entity\Usuario;
use Models\Services\UsuarioService;
use Exception;

class UsuarioController {
    private UsuarioService $usuarioService;

    public function __construct() {
        session_start(); // Iniciar sesión
        $this->usuarioService = new UsuarioService();
    }

    public function loginForm() {
        include 'Views/usuario/login.php';
    }

    public function registrarForm() {
        include 'Views/usuario/registro.php';
    }

    public function login(array $datos) {
        try {
            $correo = $datos['correo'];
            $password = $datos['password'];

            if ($this->usuarioService->login($correo, $password)) {
                header("Location: /edificio/listado");
            } else {
                echo "Credenciales inválidas.";
            }
        } catch (Exception $e) {
            echo "Error al iniciar sesión: " . $e->getMessage();
        }
    }

    public function registrar(array $datos) {
        try {
            $usuario = new Usuario($datos['nombre'], $datos['correo'], $datos['password']);
            $this->usuarioService->registrar($usuario);
            echo "Usuario registrado correctamente. <a href='/usuario/login'>Iniciar sesión</a>";
        } catch (Exception $e) {
            echo "Error al registrar: " . $e->getMessage();
        }
    }

    public function logout() {
        $this->usuarioService->logout();
        header("Location: /usuario/login");
    }
}

