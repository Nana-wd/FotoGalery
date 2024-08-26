<?php

class DataBaseConnect
{


    /**
     * @return PDO
     */
    public static function connect(): PDO
    {
        return new PDO('mysql:host=127.0.0.1;dbname=fotoGalery', 'root','');
    }
}
