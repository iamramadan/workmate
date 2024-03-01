<?php
namespace conn;
require "db_connection.php";


class Connect{
    protected static $pdo;

    public function connect(){
        // global $DNS;
        try{
            //PDO connection
            self::$pdo = new \PDO(DNS,USER,PASSWORD);
            return self::$pdo;
        }
        catch(\Exception $e){
            die('Unable to establish database connection');
        }
    }
}