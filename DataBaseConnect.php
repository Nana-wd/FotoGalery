<?php
require_once "AppConstance.php";
class DataBaseConnect
{

    /**
     * @return PDO
     */
    public static function connect(): PDO
    {
//
        $dsn = 'mysql:host=' . AppConstance::DB_HOST . ';dbname=' . AppConstance::DB_NAME;
        $userName= AppConstance::DB_USER;
        $password= AppConstance::DB_PASS;
        return new PDO($dsn, $userName,$password);
    }
}
