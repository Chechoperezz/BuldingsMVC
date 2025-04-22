<?php
declare(strict_types=1);


require_once __DIR__ . '/utils/ConnectionDBMySQL.php';


spl_autoload_register(function (string $class) {
    $baseDir = __DIR__ . DIRECTORY_SEPARATOR;
    $file    = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});


$ctrl = ucfirst($_GET['controller'] ?? 'usuario') . 'Controller';
$act  = $_GET['action']   ?? 'login';
$full = "\\Controllers\\$ctrl";

if (!class_exists($full)) {
    http_response_code(404);
    echo "Controlador no encontrado: $full";
    exit;
}

$controller = new $full();


$controller->{$act}();








