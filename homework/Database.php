<?php

class DB
{
    public static $localhost = 'localhost';
    public static $username = 'root';
    public static $password = 'mr2344';
    public static $dbname = 'dars14';

    public static function connect()
    {
        return new PDO("mysql:host=" . self::$localhost . ";dbname=".self::$dbname, self::$username, self::$password);
    }
}

?>