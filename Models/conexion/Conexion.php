<?php

class Database
{
    private static $server = 'ec2-44-192-245-97.compute-1.amazonaws.com;port=5432';

    private static $dbName = 'd1a7mom45t35mo';
    private static $dbUser = 'ujdhgrrkvsismt';
    private static $dbPass = 'f5e41db87aef3e018ac0b761e12c0ff2327507fdd86de69c26f007f961e26e0d'; 

    public static function Connect()
    {
        try{
            $connection = new PDO('pgsql:host='.self::$server.';dbname='.self::$dbName.';charset=utf8',self::$dbUser,self::$dbPass);
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            return $connection;
        }catch(PDOException $e){
            return "Error: ".$e->getMessage();

        }
    }
}