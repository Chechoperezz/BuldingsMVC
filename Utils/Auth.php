<?php

namespace Utils;

class Auth {
    public static function checkAuth() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header("Location: /login.php");
            exit;
        }
    }
}
