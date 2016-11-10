<?php

//klasa odpowiedzialna za tworzenie obiektu mysqli i połączenia
class Database {

    static protected $dbUser = 'root';
    static protected $dbPass = 'coderslab';
    static protected $dbName = 'Twitter';
    static protected $dbHost = 'localhost';

    static public function createConnection() {
        return $connection = new mysqli(self::$dbHost, self::$dbUser, self::$dbPass, self::$dbName);
    }

}
