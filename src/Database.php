<?php

/*
CONNEXION BASE DE DONNEES MySQL : 
Singleton (une seule instance d'une classe partagée à plusieurs endroits du code)
*/


namespace App;

use PDO;
use PDOException;
use Symfony\Component\Dotenv\Dotenv;

class Database
{
    private static ?PDO $pdoInstance = null;
    private const ENV_FILE_PATH = __DIR__ . '/../.env';
    private function __construct()
    {
    }

    public static function getConnection(): PDO
    {
        if (self::$pdoInstance === null){
            try {
                $dotenv = new Dotenv();
                $dotenv->loadEnv(self::ENV_FILE_PATH);
               [
                'DB_DRIVER'=>$driver,
                'DB_HOST'=> $host,
                'DB_PORT'=>$port,
                'DB_NAME'=>$dbName,
                'DB_CHARSET'=> $charset,
                'DB_USER'=> $user,
                'DB_PASSWORD'=> $password,
               ] = $_ENV;

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
