<?php
namespace FotoGalery;

class DataBaseConnect {
    
    public static function connect($server, $database, $user, $password) {
        try {
          
            $dsn = "mysql:host=$server;fotoGalery=$database";

           
            $pdo = new PDO($dsn, $user, $password);
         
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Connection successful!";
            return $pdo;

        } catch (PDOException $e) {
           
            throw new Exception("Failed to connect to the database: " . $e->getMessage());
        }
    }
}