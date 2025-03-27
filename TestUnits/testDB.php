<?php

require_once("../Utils/ConnectionDBMySQL.php");


$conn = ConnectionDBMySQL::connection();
if ($conn) {
    echo "✅ Conexión a la base de datos exitosa.";
} else {
    echo " Error en la conexión.";
}

