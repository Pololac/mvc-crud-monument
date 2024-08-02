<?php

/*
CONNEXION BASE DE DONNEES MySQL : 
Singleton (une seule instance d'une classe partagée à plusieurs endroits du code)
*/


namespace App;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $pdoInstance = null;
    private const DB_SETTINGS_PATH = __DIR__ . '/../config/db.ini';
    private function __construct()
    {
    }

    public static function getConnection(): PDO
    {
        if (self::$pdoInstance === null){
            try {
               [
                'DB_DRIVER'=>$driver,
                'DB_HOST'=> $host,
                'DB_PORT'=>$port,
                'DB_NAME'=>$dbName,
                'DB_CHARSET'=> $charset,
                'DB_USER'=> $user,
                'DB_PASSWORD'=> $password,
               ] = parse_ini_file(self::DB_SETTINGS_PATH);

                //IP locale ordi : 127.0.0.1 & Port par défaut de MySQL : 3306
                self::$pdoInstance = new PDO(
                    "$driver:host=$host;port=$port;charset=$charset;dbname=$dbName",
                    $user,
                    $password
                );

            } catch (PDOException $e) {

                die('Erreur de connexion à la bdd');
            }
        }
    return self::$pdoInstance;
    }
}   
