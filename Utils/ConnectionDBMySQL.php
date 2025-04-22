<?php


namespace Utils;

use PDO;
use PDOException;
class ConnectionDBMySQL{

    private static $host = '127.0.0.1';
    private static $database = 'Buildings';

    private static $user = 'root';
    private static $password = '1055';
    private static $connection = null;

    public static function connection(){
        if(self::$connection=== null){
            try{
                self::$connection = new PDO (
                    "mysql:host=". self::$host . ";dbname=".self::$database . ";charset=utf8",
                    self::$user,
                    self::$password,

                );
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch (PDOException $e){
                die("Error en conexion " .$e->getMessage());

            }
        }
        return self::$connection;
    }

    public static function disconnect(){
        self::$connection = null;
    }
}
?>
