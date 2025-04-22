<?php

namespace Controllers;

use Models\Services\UsuarioService;
use Exception;

class UsuarioController {
    private UsuarioService $usuarioService;

    public function __construct() {
        session_start();
        $this->usuarioService = new UsuarioService();
    }


    public function registrar() {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require __DIR__ . '/../Views/forms/users/register.php';
            return;
        }

        try {
            $this->usuarioService->registrar(
                $_POST['nombre'],
                $_POST['email'],
                $_POST['password']
            );

            header('Location: index.php?controller=usuario&action=login');
            exit();
        } catch (Exception $e) {
            $error = $e->getMessage();
            require __DIR__ . '/../Views/forms/users/register.php';
        }
    }


    public function login() {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require __DIR__ . '/../Views/forms/users/login.php';
            return;
        }

        try {
            if ($this->usuarioService->login(
                $_POST['email'],
                $_POST['password']
            )) {
                header('Location: index.php?controller=edificio&action=crear');
                exit();
            } else {
                $error = "Credenciales inválidas.";
                require __DIR__ . '/../Views/forms/users/login.php';
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
            require __DIR__ . '/../Views/forms/users/login.php';
        }
    }

    public function logout() {
        $this->usuarioService->logout();
        header('Location: index.php?controller=usuario&action=login');
        exit();
    }
}


