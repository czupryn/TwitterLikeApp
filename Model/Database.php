<?php
//klasa odpowiedzialna za tworzenie obiektu mysqli i połączenia
class Database{
    static protected $dbUser='root';
    static protected $dbPass='';
    static protected $dbName='exercise_db';
    static protected $dbHost='localhost';
    
    static function createConnection(){
        return $connection= new mysqli(self::$dbHost, self::$dbUser, self::$dbPass, self::$dbName);
    }
}

