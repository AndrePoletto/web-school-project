<?php

class Database
{
    private static $instance;

    public static function getConnection()
    {

        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];
        $host = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_NAME'];


        if (!isset(self::$instance)) {
            try {

                self::$instance = new PDO('mysql:host=' . $host . ';dbname=' . $dbName . ';', $user, $password);;
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }

        }

        return self::$instance;
    }
}