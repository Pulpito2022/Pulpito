<?php
    class Database{

        private static $dbHost = "localhost";
        private static $dbName = "apvuwswpulpito";
        private static $dbUser = "root";
        private static $dbUserPassword = "mysql";
        private static $connectdb = null;

    public static function connect(){
        try{
            self::$connectdb = new PDO("mysql:host=" .self::$dbHost .";dbname=". self::$dbName,self::$dbUser,self::$dbUserPassword);
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
        return self::$connectdb;
    }
    public static function disconnect(){
        self::$connectdb = null;
    }
    }

Database::connect();
?>